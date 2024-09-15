<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\admin;
use App\Models\certificate;
use Illuminate\Http\Request;
use App\Models\contact_us;
use App\Models\blog;
use App\Models\Newsletter;
use App\Models\product_fruit;
use App\Models\Products;
use App\Models\SeoSetting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    function admin_login()
    {
        return view('admin.admin-login');
    }

    public function login_submit(Request $request)
    {
        $message = [
            'email.required' => 'Please enter your email.',
            'password.required' => 'Please enter your password.',
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $message);

        $email = $request->get('email');
        $password = $request->get('password');

        $user = Admin::where('email', $email)->where('password', $password)->first();

        if ($user) {
            Session::put('email', $user);
            return response()->json(['success' => 'Login successful! Redirecting...']);
        } else {
            return response()->json(['error' => 'Please enter a valid email and password.'], 401);
        }
    }

    function admin_logout()
    {
        Session::flush();
        return redirect('admin')->with('success', 'Logout successful!');
    }

    function forgot()
    {
        return view('admin.forgot-password');
    }

    function forgot_password(Request $request)
    {
        $message = [
            'email.required' => 'Please Enter Valid Email Id.',
            'email.exists' => 'This Email Is Not Saved In Database.'
        ];

        $request->validate([
            'email' => 'required|exists:admin,email'
        ], $message);

        $otp = random_int(100000, 999999);

        $admin = admin::where('email', $request->input('email'))->first();

        // Check if admin exists before proceeding
        if (!$admin) {
            return redirect()->back()->with('error', 'Email not found in the database.');
        }

        $admin->password_change_otp = $otp;
        $admin->otp_expires_at = Carbon::now('Asia/Kolkata')->addMinutes(10);
        $admin->save();

        $data = [
            'email' => $request->input('email'),
            'otp' => $otp,
        ];

        Session::put('mail', $request->input('email'));

        Mail::send('admin.mail', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Forgot Password OTP');
        });

        return redirect('otp')->with(['success' => 'Email sent successfully!']);
    }


    public function password_otp()
    {
        return view('admin.admin_otp');
    }

    public function SubmitOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required'
        ]);

        $admin = admin::where('email', Session::get('mail'))->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'Admin not found. Please try again.');
        }

        if ($admin->password_change_otp == $request->input('otp')) {
            return redirect('reset-password')->with('success', 'OTP verified successfully! You can now reset your password.');
        } else {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }
    }

    public function reset_password()
    {
        return view('admin.admin-reset-password');
    }

    public function ResetPassword(Request $request)
    {
        $message = [
            'password.required' => 'Please enter a new password.',
            'confirm_password.required' => 'Please confirm your new password.',
            'confirm_password.same' => 'The confirmation password does not match.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ];

        $request->validate([
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            'confirm_password' => 'required|same:password'
        ], $message);

        $admin = admin::where('email', Session::get('mail'))->first();

        if ($admin) {
            // $admin->password = Hash::make($request->input('password'));
            $admin->password=$request->input('password');
            $admin->password_change_otp = null;
            $admin->otp_expires_at = null;
            $admin->save();

            Session::forget('mail');

            return redirect('admin')->with('success', 'Password changed successfully! You can now log in.');
        }

        return redirect()->back()->with('error', 'Admin not found. Please try again.');
    }

    public function index()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        return view('admin.index');
    }

    function admin_contact()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        $contacts = contact_us::all();
        return view('admin.contact', compact('contacts'));
    }

    public function send_mail(Request $request)
    {
        $request->validate([
            'mail' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'mail' => $request->input('mail'),
            'subject' => $request->input('subject'),
            'messageContent' => $request->input('message')
        ];

        try {
            Mail::send('admin.contact_mail_send', $data, function ($message) use ($data) {
                $message->to($data['mail']);
                $message->subject($data['subject']);
            });

            return redirect()->back()->with('success', 'Mail sent successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send mail: ' . $e->getMessage());
        }
    }
    public function delete_contact($id)
    {
        try {
            $contact = contact_us::findOrFail($id);
            $contact->delete();
            return redirect()->back()->with('d_success', 'Contact deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('d_error', 'Failed to delete contact: ' . $e->getMessage());
        }
    }

    public function bulkDeleteContact(Request $request)
    {
        $ids = $request->input('ids');

        if (!empty($ids)) {
            contact_us::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected Contact Us Details deleted successfully!');
        }

        return redirect()->back()->with('error', 'No items were selected.');
    }

    function admin_certificate()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        $certificates = certificate::all();
        return view('admin.certificate', compact('certificates'));
    }

    public function add_certificate()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        return view('admin.add_certificate');
    }

    public function insert_certificate(Request $request)
    {
        $request->validate([
            'certificate_name' => 'required',
            'certificate_image' => 'required|image|mimes:jpeg,png,jpg|max:204800', // Changed to 200 MB
            'certificate_description' => 'required',
        ], [
            'certificate_name.required' => 'The certificate name field is required.',
            'certificate_image.required' => 'The certificate image field is required.',
            'certificate_image.image' => 'The certificate image must be an image file.',
            'certificate_image.mimes' => 'The certificate image must be a file of type: jpeg, png, jpg.',
            'certificate_image.max' => 'The certificate image may not be greater than 200 MB.',
            'certificate_description.required' => 'The certificate description field is required.',
        ]);

        try {
            $certificate = new certificate();
            $certificate->certificate_name = $request->input('certificate_name');
            $certificate->certificate_description = $request->input('certificate_description');

            if ($request->hasFile('certificate_image')) {
                $image = $request->file('certificate_image');
                $imageName = 'certificate_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/certificates'), $imageName);
                $certificate->certificate_image = $imageName;
            }

            $certificate->save();

            return redirect('admin-certificate')->with('success', 'Certificate added successfully!');
        } catch (\Exception $e) {
            return redirect('admin-certificate')->with('error', 'Failed to add certificate: ' . $e->getMessage());
        }
    }

    public function update_certificate(Request $request, $id)
    {
        $request->validate([
            'certificate_name' => 'required',
            'certificate_image' => 'image|mimes:jpeg,png,jpg|max:20480',
            'certificate_description' => 'required',
        ], [
            'certificate_name.required' => 'The certificate name field is required.',
            'certificate_image.image' => 'The certificate image must be an image file.',
            'certificate_image.mimes' => 'The certificate image must be a file of type: jpeg, png, jpg.',
            'certificate_image.max' => 'The certificate image may not be greater than 20480 kilobytes.',
            'certificate_description.required' => 'The certificate description field is required.',
        ]);

        try {
            $certificate = certificate::findOrFail($id);
            $certificate->certificate_name = $request->input('certificate_name');
            $certificate->certificate_description = $request->input('certificate_description');

            if ($request->hasFile('certificate_image')) {
                // Delete old image
                if ($certificate->certificate_image) {
                    $oldImagePath = public_path('images/certificates/' . $certificate->certificate_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload new image
                $image = $request->file('certificate_image');
                $imageName = 'certificate_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/certificates'), $imageName);
                $certificate->certificate_image = $imageName;
            }

            $certificate->save();

            return redirect('admin-certificate')->with('success', 'Certificate updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update certificate: ' . $e->getMessage());
        }
    }

    function edit_certificate($id)
    {
        $GetData = certificate::all();
        $new = certificate::find($id);
        $url = url('/certificate/update/' . $id);
        $data = compact('GetData', 'new', 'url');
        return view('admin.certificate_edit', $data);
    }

    function delete_certificate($id)
    {
        try {
            $certificate = certificate::findOrFail($id);

            if ($certificate->certificate_image) {
                $imagePath = public_path('images/certificates/' . $certificate->certificate_image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $certificate->delete();

            return redirect()->back()->with('success', 'Certificate and associated image deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete certificate: ' . $e->getMessage());
        }
    }

    public function bulkDeleteCertificate(Request $request)
    {
        $ids = $request->input('ids');

        if (!empty($ids)) {
            certificate::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected Certificate deleted successfully!');
        }

        return redirect()->back()->with('error', 'No items were selected.');
    }

    function admin_blog()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        $blogs = blog::all();
        return view('admin.blog', compact('blogs'));
    }

    function add_blog()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        return view('admin.add_blog');
    }

    public function store_blog(Request $request)
    {
        $message = [
            'title.required' => 'Please write a blog title.',
            'category.required' => 'Please select a category.',
            'content.required' => 'Please write something in the content field.',
            'blog_image.required' => 'Please upload a blog image.',
            'blog_image.mimes' => 'The blog image must be a file of type: jpeg, png, jpg.',
            'blog_image.max' => 'The blog image may not be greater than 20480 kilobytes.',
        ];

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'blog_image' => 'required|mimes:jpeg,png,jpg|max:20480',
        ], $message);

        $blog = new blog();
        $blog->title = $request->input('title');
        $blog->category = $request->input('category');
        $blog->content = $request->input('content');
        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $imageName = 'blog_' . date('d-m-Y') . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blog'), $imageName);
            $blog->image = $imageName;
        }
        $blog->date = date('d-m-Y');

        $blog->save();

        return redirect('admin-blog')->with('success', 'Blog added successfully!');
    }

    //edit blog
    function edit_blog($id)
    {
        $blogs = blog::all();
        $new = blog::find($id);
        $url = url('/update-blog/' . $id);
        $data = compact('blogs', 'new', 'url');
        return view('admin.blog_edit', $data);
    }

    //update blog
    public function update_blog(Request $request, $id)
    {
        $message = [
            'title.required' => 'Please write a blog title.',
            'category.required' => 'Please select a category.',
            'content.required' => 'Please write something in the content field.',
            'blog_image.mimes' => 'The blog image must be a file of type: jpeg, png, jpg.',
            'blog_image.max' => 'The blog image may not be greater than 20480 kilobytes.',
        ];

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'blog_image' => 'nullable|mimes:jpeg,png,jpg|max:20480',
        ], $message);

        $blog = blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->category = $request->input('category');
        $blog->content = $request->input('content');

        if ($request->hasFile('blog_image')) {
            // Delete old image
            if ($blog->image) {
                $oldImagePath = public_path('images/blog/' . $blog->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload new image
            $image = $request->file('blog_image');
            $imageName = 'blog_' . date('d-m-Y') . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blog'), $imageName);
            $blog->image = $imageName;
        }
        $blog->date = date('d-m-Y');

        $blog->save();

        return redirect('admin-blog')->with('success', 'Blog updated successfully!');
    }

    //delete blog
    public function delete_blog($id)
    {
        try {
            $blog = blog::findOrFail($id);

            // Delete the associated image file
            if ($blog->image) {
                $imagePath = public_path('images/blog/' . $blog->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $blog->delete();
            return redirect()->back()->with('success', 'Blog and associated image deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete blog: ' . $e->getMessage());
        }
    }

    public function bulkDeleteBlog(Request $request)
    {
        $ids = $request->input('ids');

        if (!empty($ids)) {
            blog::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected Blog deleted successfully!');
        }

        return redirect()->back()->with('error', 'No items were selected.');
    }

    function admin_products()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        // Fetch products in ascending order by 'id' (or another column if needed)
        $products = Products::orderBy('id', 'asc')->get();

        return view('admin.products', compact('products'));
    }

    function add_products()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        return view('admin.add_products');
    }

    function add_fruits()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        return view('admin.add_fruits');
    }

    public function store_products(Request $request)
    {
        $message = [
            'name.required' => 'Please write a product name.',
            'description.required' => 'Please write a product description.',
            'product_hs_code.required' => 'Please write a product hs code.',
            'bg_image.required' => 'Please upload a product background image.',
            'bg_image.mimes' => 'The product background image must be a file of type: jpeg, png, jpg.',
            'bg_image.max' => 'The product background image may not be greater than 20MB.',
            'other_image.required' => 'Please upload at least three product images.',
            'other_image.*.mimes' => 'The product images must be files of type: jpeg, png, jpg.',
            'other_image.*.max' => 'Each product image may not be greater than 20MB.',
            'other_image.size' => 'You can upload a maximum of 8 product images.',
            'other_image.min' => 'Please upload at least Five product images.'
        ];
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_hs_code' => 'required',
            'bg_image' => 'required|mimes:jpeg,png,jpg|max:20480',
            'other_image' => 'required|array|min:5|max:30',
            'other_image.*' => 'mimes:jpeg,png,jpg|max:20480'
        ], $message);

        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->product_hs_code = $request->input('product_hs_code');

        if ($request->hasFile('bg_image')) {
            $image = $request->file('bg_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $product->bg_image = $imageName;
        }

        if ($request->hasFile('other_image')) {
            $otherImages = $request->file('other_image');
            $imageNames = [];
            $errorMessages = [];

            foreach ($otherImages as $image) {
                $imageNameOther = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension(); // Ensure unique names
                if ($image->isValid()) {
                    $image->move(public_path('images/products'), $imageNameOther);
                    $imageNames[] = $imageNameOther; // Store each image name
                } else {
                    $errorMessages[] = "The product image '{$imageNameOther}' failed to upload.";
                }
            }

            if (!empty($errorMessages)) {
                return redirect()->back()->withErrors(['other_image' => $errorMessages]);
            }

            $product->other_image = json_encode($imageNames); // Store as JSON
        }

        $product->save();

        return redirect('admin-vegitables')->with('success', 'Product added successfully!');
    }

    public function store_products_fruits(Request $request)
    {
        $message = [
            'name.required' => 'Please write a product name.',
            'description.required' => 'Please write a product description.',
            'product_hs_code.required' => 'Please write a product hs code.',
            'bg_image.required' => 'Please upload a product background image.',
            'bg_image.mimes' => 'The product background image must be a file of type: jpeg, png, jpg.',
            'bg_image.max' => 'The product background image may not be greater than 20MB.',
            'other_image.required' => 'Please upload at least three product images.',
            'other_image.*.mimes' => 'The product images must be files of type: jpeg, png, jpg.',
            'other_image.*.max' => 'Each product image may not be greater than 20MB.',
            'other_image.size' => 'You can upload a maximum of 8 product images.',
            'other_image.min' => 'Please upload at least Five product images.'
        ];
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_hs_code' => 'required',
            'bg_image' => 'required|mimes:jpeg,png,jpg|max:20480',
            'other_image' => 'required|array|min:5|max:30',
            'other_image.*' => 'mimes:jpeg,png,jpg|max:20480'
        ], $message);

        $product = new product_fruit();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->product_hs_code = $request->input('product_hs_code');

        if ($request->hasFile('bg_image')) {
            $image = $request->file('bg_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $product->bg_image = $imageName;
        }

        if ($request->hasFile('other_image')) {
            $otherImages = $request->file('other_image');
            $imageNames = [];
            $errorMessages = [];

            foreach ($otherImages as $image) {
                $imageNameOther = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension(); // Ensure unique names
                if ($image->isValid()) {
                    $image->move(public_path('images/products'), $imageNameOther);
                    $imageNames[] = $imageNameOther; // Store each image name
                } else {
                    $errorMessages[] = "The product image '{$imageNameOther}' failed to upload.";
                }
            }

            if (!empty($errorMessages)) {
                return redirect()->back()->withErrors(['other_image' => $errorMessages]);
            }

            $product->other_image = json_encode($imageNames); // Store as JSON
        }

        $product->save();

        return redirect('admin-fruits')->with('success', 'Product added successfully!');
    }

    public function delete_product($id)
    {
        $product = Products::findOrFail($id);

        // Delete the product images from the storage
        if ($product->bg_image) {
            $bgImagePath = public_path('images/products/' . $product->bg_image);
            if (file_exists($bgImagePath)) {
                unlink($bgImagePath);
            }
        }

        if ($product->other_image) {
            $otherImages = json_decode($product->other_image);
            foreach ($otherImages as $image) {
                $otherImagePath = public_path('images/products/' . $image);
                if (file_exists($otherImagePath)) {
                    unlink($otherImagePath);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function delete_product_fruits($id)
    {
        $product = product_fruit::findOrFail($id);

        // Delete the product images from the storage
        if ($product->bg_image) {
            $bgImagePath = public_path('images/products/' . $product->bg_image);
            if (file_exists($bgImagePath)) {
                unlink($bgImagePath);
            }
        }

        if ($product->other_image) {
            $otherImages = json_decode($product->other_image);
            foreach ($otherImages as $image) {
                $otherImagePath = public_path('images/products/' . $image);
                if (file_exists($otherImagePath)) {
                    unlink($otherImagePath);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    function edit_product($id)
    {
        $products = Products::orderBy('id', 'asc')->get();
        $new = Products::find($id);
        $url = url('/update-product/' . $id);
        $data = compact('products', 'new', 'url');
        return view('admin.products_edit', $data);
    }

    function edit_product_fruits($id)
    {
        $products = product_fruit::orderBy('id', 'asc')->get();
        $new = product_fruit::find($id);
        $url = url('/update-product-fruits/' . $id);
        $data = compact('products', 'new', 'url');
        return view('admin.fruits_edit', $data);
    }

    public function update_product(Request $request, $id)
    {
        $message = [
            'name.required' => 'Please write a product name.',
            'description.required' => 'Please write a product description.',
            'product_hs_code.required' => 'Please write a product hs code.',
            'bg_image.mimes' => 'The product background image must be a file of type: jpeg, png, jpg.',
            'bg_image.max' => 'The product background image may not be greater than 20480 kilobytes.',
            'other_image.*.mimes' => 'The product other images must be files of type: jpeg, png, jpg.',
            'other_image.*.max' => 'Each product other image may not be greater than 20480 kilobytes.',
        ];

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_hs_code' => 'required',
            'bg_image' => 'nullable|mimes:jpeg,png,jpg|max:20480',
            'other_image.*' => 'nullable|mimes:jpeg,png,jpg|max:20480',
        ], $message);

        $product = Products::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->product_hs_code = $request->input('product_hs_code');

        if ($request->hasFile('bg_image')) {
            // Delete old background image
            if ($product->bg_image) {
                $oldBgImagePath = public_path('images/products/' . $product->bg_image);
                if (file_exists($oldBgImagePath)) {
                    unlink($oldBgImagePath);
                }
            }

            // Upload new background image
            $bgImage = $request->file('bg_image');
            $bgImageName = time() . '.' . $bgImage->getClientOriginalExtension();
            $bgImage->move(public_path('images/products'), $bgImageName);
            $product->bg_image = $bgImageName;
        }

        if ($request->hasFile('other_image')) {
            $otherImages = $request->file('other_image');
            $imageNames = [];

            // Delete old other images
            if ($product->other_image) {
                $oldOtherImages = json_decode($product->other_image);
                foreach ($oldOtherImages as $oldImage) {
                    $oldImagePath = public_path('images/products/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            // Upload new other images
            foreach ($otherImages as $image) {
                $imageNameOther = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $imageNameOther);
                $imageNames[] = $imageNameOther;
            }

            $product->other_image = json_encode($imageNames);
        }

        $product->save();

        return redirect('admin-vegitables')->with('success', 'Product updated successfully!');
    }

    public function update_product_fruits(Request $request, $id)
    {
        $message = [
            'name.required' => 'Please write a product name.',
            'description.required' => 'Please write a product description.',
            'product_hs_code.required' => 'Please write a product hs code.',
            'bg_image.mimes' => 'The product background image must be a file of type: jpeg, png, jpg.',
            'bg_image.max' => 'The product background image may not be greater than 20480 kilobytes.',
            'other_image.*.mimes' => 'The product other images must be files of type: jpeg, png, jpg.',
            'other_image.*.max' => 'Each product other image may not be greater than 20480 kilobytes.',
        ];

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'product_hs_code' => 'required',
            'bg_image' => 'nullable|mimes:jpeg,png,jpg|max:20480',
            'other_image.*' => 'nullable|mimes:jpeg,png,jpg|max:20480',
        ], $message);

        $product = product_fruit::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->product_hs_code = $request->input('product_hs_code');

        if ($request->hasFile('bg_image')) {
            // Delete old background image
            if ($product->bg_image) {
                $oldBgImagePath = public_path('images/products/' . $product->bg_image);
                if (file_exists($oldBgImagePath)) {
                    unlink($oldBgImagePath);
                }
            }

            // Upload new background image
            $bgImage = $request->file('bg_image');
            $bgImageName = time() . '.' . $bgImage->getClientOriginalExtension();
            $bgImage->move(public_path('images/products'), $bgImageName);
            $product->bg_image = $bgImageName;
        }

        if ($request->hasFile('other_image')) {
            $otherImages = $request->file('other_image');
            $imageNames = [];

            // Delete old other images
            if ($product->other_image) {
                $oldOtherImages = json_decode($product->other_image);
                foreach ($oldOtherImages as $oldImage) {
                    $oldImagePath = public_path('images/products/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            // Upload new other images
            foreach ($otherImages as $image) {
                $imageNameOther = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/products'), $imageNameOther);
                $imageNames[] = $imageNameOther;
            }

            $product->other_image = json_encode($imageNames);
        }

        $product->save();

        return redirect('admin-fruits')->with('success', 'Product updated successfully!');
    }

    public function bulkDeleteProduct(Request $request)
    {
        $ids = $request->input('ids');

        if (!empty($ids)) {
            Products::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected Product deleted successfully!');
        }

        return redirect()->back()->with('error', 'No items were selected.');
    }

    public function bulkDeleteProductFruits(Request $request)
    {
        $ids = $request->input('ids');

        if (!empty($ids)) {
            product_fruit::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected Product deleted successfully!');
        }

        return redirect()->back()->with('error', 'No items were selected.');
    }

    public function add_fruit()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        // Fetch products in ascending order by 'id' (or another column if needed)
        $products = product_fruit::orderBy('id', 'asc')->get();

        return view('admin.f_products', compact('products'));
    }

    public function smtp()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        return view('admin.smtp');
    }

    public function update_smtp(Request $request)
    {
        // Validate the input
        $request->validate([
            'mailer' => 'required|string',
            'host' => 'required|string',
            'port' => 'required|integer',
            'username' => 'required|string',
            'password' => 'required|string',
            'encryption' => 'required|string',
            'from_address' => 'required|string',
        ]);

        // Get the current .env file path
        $envFile = base_path('.env');

        // Read the .env file content
        $envContent = File::get($envFile);

        // Replace the old values with new values
        $envContent = preg_replace('/MAIL_MAILER=.*/', 'MAIL_MAILER=' . $request->mailer, $envContent);
        $envContent = preg_replace('/MAIL_HOST=.*/', 'MAIL_HOST=' . $request->host, $envContent);
        $envContent = preg_replace('/MAIL_PORT=.*/', 'MAIL_PORT=' . $request->port, $envContent);
        $envContent = preg_replace('/MAIL_USERNAME=.*/', 'MAIL_USERNAME=' . $request->username, $envContent);
        $envContent = preg_replace('/MAIL_PASSWORD=.*/', 'MAIL_PASSWORD="' . $request->password . '"', $envContent);
        $envContent = preg_replace('/MAIL_ENCRYPTION=.*/', 'MAIL_ENCRYPTION=' . $request->encryption, $envContent);
        $envContent = preg_replace('/MAIL_FROM_ADDRESS=.*/', 'MAIL_FROM_ADDRESS=' . $request->from_address, $envContent);

        // Write the updated content back to the .env file
        File::put($envFile, $envContent);

        return redirect()->back()->with('success', 'SMTP settings updated successfully!');
    }

    public function cache()
    {
        return view('admin.cache');
    }

    public function sendSmtpEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'messageContent' => $request->input('message')
        ];

        Mail::send('admin.test_mail', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

        return redirect()->back()->with(['success_text' => 'Email sent successfully!']);
    }

    public function all_subscriber()
    {
        $subscriber = Newsletter::all();
        return view('admin.subscriber', compact('subscriber'));
    }

    public function subscriber_delete($id)
    {
        Newsletter::find($id)->delete();
        return redirect()->back()->with(['success' => 'Subscriber Deleted Successfully!']);
    }

    public function sendEmail(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'messageContent' => $request->input('message')
        ];

        Mail::send('admin.newsletter', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject($data['subject']);
        });

        return redirect()->back()->with('success', 'Email sent successfully!');
    }

    public function all_subscriber_mail()
    {
        return view('admin.all_subscriber');
    }

    public function all_subscriber_send_mail(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $subscribers = Newsletter::pluck('email')->toArray();

        $data = [
            'subject' => $request->input('subject'),
            'messageContent' => $request->input('message')
        ];

        foreach ($subscribers as $email) {
            $data['email'] = $email;

            Mail::send('admin.newsletter', $data, function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject']);
            });
        }

        return redirect()->back()->with('success', 'All Subscriber Mail sent successfully!');
    }

    public function add_seo()
    {
        if (!Session::has('email')) {
            return redirect('admin')->with('error', 'Please log in to access this page.');
        }

        return view('admin.add_seo');
    }

    public function seo()
    {
        $seoSettings = SeoSetting::all();

        $descriptions = $seoSettings->pluck('description')->implode(', ');
        $keywords = $seoSettings->pluck('keywords')->implode(', ');

        return view('admin.seo', compact('descriptions', 'keywords', 'seoSettings'));
    }

    public function update_seo(Request $request)
    {
        $request->validate([
            'keywords' => 'required|string|max:255',
            'description' => 'required|string|max:160'
        ]);

        $seoSetting = new SeoSetting();

        $seoSetting->keywords = $request->input('keywords');
        $seoSetting->description = $request->input('description');
        $seoSetting->save();

        return redirect('admin-seo')->with('success', 'SEO Details Added Successfully.');
    }

    public function seo_delete($id)
    {
        SeoSetting::find($id)->delete();
        return redirect()->back()->with(['success' => 'SEO Details Deleted Successfully.']);
    }

    function edit_seo($id)
    {
        $seoSettings = SeoSetting::all();
        $new = SeoSetting::find($id);
        $url = url('/update-seo/' . $id);
        $data = compact('seoSettings', 'new', 'url');
        return view('admin.seo_edit', $data);
    }

    public function update_seo_d(Request $request, $id)
    {
        $request->validate([
            'keywords' => 'required|string|max:255',
            'description' => 'required|string|max:160'
        ]);

        $seoSetting = SeoSetting::findOrFail($id);

        $seoSetting->keywords = $request->input('keywords');
        $seoSetting->description = $request->input('description');
        $seoSetting->save();

        return redirect('admin-seo')->with('success', 'SEO Details Updated Successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (!empty($ids)) {
            SeoSetting::whereIn('id', $ids)->delete();
            return redirect()->back()->with('d_success', 'Selected SEO settings deleted successfully!');
        }

        return redirect()->back()->with('d_error', 'No items were selected.');
    }

    public function bulkDeletesubscriber(Request $request)
    {
        $ids = $request->input('ids');

        if (!empty($ids)) {
            Newsletter::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Selected Subscriber deleted successfully!');
        }

        return redirect()->back()->with('error', 'No items were selected.');
    }
}
