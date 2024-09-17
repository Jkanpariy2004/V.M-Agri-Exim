<?php

use App\Http\Controllers\About;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Certificate;
use App\Http\Controllers\contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\product_details;
use App\Http\Controllers\service;
use App\Http\Controllers\blog;
use App\Http\Controllers\products;
use App\Http\Controllers\CacheClear;
use App\Http\Controllers\Newsletter;
use App\Models\SeoSetting;

// // // // // // //
// Website Route  //
// // // // // // //

Route::get('/', function () {
    $seoSettings = SeoSetting::all();

    $descriptions = $seoSettings->pluck('description')->implode(', ');
    $keywords = $seoSettings->pluck('keywords')->implode(', ');

    return view('index', compact('descriptions', 'keywords'));
});

// Contact Us Page
Route::get('/contact', [contact::class, 'index']);
Route::post('/contact/submit_contact', [contact::class, 'submit_contact']);

// About Us Page
Route::get('/about', [About::class, 'index']);

// Certificate Page
Route::get('/certificate', [Certificate::class, 'index']);

// Blog PAge
Route::get('/blog', [blog::class, 'index']);
Route::get('/blog-details/{id}', [blog::class, 'blog_details']);
Route::post('/insert-comment', [blog::class, 'insertComment']);

//Products And Product Details Page
Route::get('/products', [products::class, 'index']);
Route::get('/product-details/{id}', [products::class, 'product_details']);

Route::post('/newsletter', [Newsletter::class, 'newsletter']);

// // // // // // // //
// Admin Panel Route //
// // // // // // // //

// Admin Login Page
Route::get('/admin', [AdminController::class, 'admin_login']);
Route::post('/login-submit', [AdminController::class, 'login_submit']);
Route::get('/admin-logout', [AdminController::class, 'admin_logout']);

// Admin Home PAge
Route::get('/admin-dashboard', [AdminController::class, 'index']);

// Cache Setting
Route::get('/admin-cache', [AdminController::class, 'cache']);
Route::get('/cache-clear', [CacheClear::class, 'clearCache'])->name('cache.clear');
Route::get('/route-cache-clear', [CacheClear::class, 'clearRouteCache'])->name('route.cache.clear');
Route::get('/config-cache-clear', [CacheClear::class, 'clearConfigCache'])->name('config.cache.clear');
Route::get('/view-cache-clear', [CacheClear::class, 'clearViewCache'])->name('view.cache.clear');
Route::get('/compiled-cache-clear', [CacheClear::class, 'clearCompiledCache'])->name('compiled.cache.clear');
Route::get('/optimize-cache-clear', [CacheClear::class, 'optimizeCache'])->name('optimize.cache.clear');

// forgot password
Route::get('/forgot-password', [AdminController::class, 'forgot']);
Route::get('/submit-forgot-password', [AdminController::class, 'forgot_password']);
Route::get('/otp',[AdminController::class,'password_otp']);
Route::post('/otp-verify',[AdminController::class,'SubmitOtp']);
Route::get('/reset-password',[AdminController::class,'reset_password']);
Route::post('/change-password',[AdminController::class,'ResetPassword']);

// admin contact page
Route::get('/admin-contact', [AdminController::class, 'admin_contact']);
Route::post('/send-mail', [AdminController::class, 'send_mail']);
Route::get('/delete-contact/{id}', [AdminController::class, 'delete_contact']);
Route::post('/bulk-delete-contact', [AdminController::class, 'bulkDeleteContact']);

// admin certificate page
Route::get('/add-certificate', [AdminController::class, 'add_certificate']);
Route::get('/admin-certificate', [AdminController::class, 'admin_certificate']);
Route::post('/insert-certificate', [AdminController::class, 'insert_certificate']);
Route::get('/delete-certificate/{id}', [AdminController::class, 'delete_certificate']);
Route::get('/edit-certificate/{id}', [AdminController::class, 'edit_certificate']);
Route::post('/update-certificate/{id}', [AdminController::class, 'update_certificate']);
Route::post('/bulk-delete-certificate', [AdminController::class, 'bulkDeleteCertificate']);

// admin blog page
Route::get('/add-blog', [AdminController::class, 'add_blog']);
Route::get('/admin-blog', [AdminController::class, 'admin_blog']);
Route::post('/store-blog', [AdminController::class, 'store_blog']);
Route::get('/delete-blog/{id}', [AdminController::class, 'delete_blog']);
Route::get('/edit-blog/{id}', [AdminController::class, 'edit_blog']);
Route::post('/update-blog/{id}', [AdminController::class, 'update_blog']);
Route::post('/bulk-delete-blog', [AdminController::class, 'bulkDeleteBlog']);

// admin product(Vegitables) page
Route::get('/add-product-vegitables', [AdminController::class, 'add_products']);
Route::get('/admin-vegitables', [AdminController::class, 'admin_products']);
Route::post('/store-products', [AdminController::class, 'store_products']);
Route::get('/edit-product/{id}', [AdminController::class, 'edit_product']);
Route::post('/update-product/{id}', [AdminController::class, 'update_product']);
Route::get('/delete-product/{id}', [AdminController::class, 'delete_product']);
Route::post('/bulk-delete-product', [AdminController::class, 'bulkDeleteProduct']);

// admin product(Fruits) page
Route::get('/admin-fruits', [AdminController::class, 'add_fruit']);
Route::get('/add-product-fruits', [AdminController::class, 'add_fruits']);
Route::post('/store-products-fruits', [AdminController::class, 'store_products_fruits']);
Route::get('/edit-product-fruits/{id}', [AdminController::class, 'edit_product_fruits']);
Route::post('/update-product-fruits/{id}', [AdminController::class, 'update_product_fruits']);
Route::get('/delete-product-fruits/{id}', [AdminController::class, 'delete_product_fruits']);
Route::post('/bulk-delete-product-fruits', [AdminController::class, 'bulkDeleteProductFruits']);

// admin smtp setting
Route::get('/admin-smtp', [AdminController::class, 'smtp']);
Route::post('/update-smtp', [AdminController::class, 'update_smtp']);
Route::post('/test-smtp-mail', [AdminController::class, 'sendSmtpEmail']);

// admin subscriber page
Route::get('/admin-subscriber', [AdminController::class, 'all_subscriber']);
Route::get('/delete-subscriber/{id}', [AdminController::class, 'subscriber_delete']);
Route::post('/send-email-subscriber', [AdminController::class, 'sendEmail']);
Route::get('/admin-subscriber-mail', [AdminController::class, 'all_subscriber_mail']);
Route::post('/admin-subscriber-send-mail', [AdminController::class, 'all_subscriber_send_mail']);
Route::post('/bulk-delete-subscriber', [AdminController::class, 'bulkDeletesubscriber'])->name('bulk.delete.subscriber');

// admin seo details
Route::get('/add-seo', [AdminController::class, 'add_seo']);
Route::get('/admin-seo', [AdminController::class, 'seo']);
Route::post('/update-seo', [AdminController::class, 'update_seo']);
Route::get('/delete-seo/{id}', [AdminController::class, 'seo_delete']);
Route::get('/edit-seo/{id}', [AdminController::class, 'edit_seo']);
Route::post('/update-seo/{id}', [AdminController::class, 'update_seo_d']);
Route::post('/bulk-delete-seo', [AdminController::class, 'bulkDelete'])->name('bulk.delete.seo');
