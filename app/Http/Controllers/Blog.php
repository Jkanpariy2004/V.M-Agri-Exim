<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog as BlogModel;
use App\Models\Comment;
use App\Models\SeoSetting;

class blog extends Controller
{
    public function index()
    {
        $blogs = BlogModel::all();
        $seoSettings = SeoSetting::all();

        $descriptions = $seoSettings->pluck('description')->implode(', ');
        $keywords = $seoSettings->pluck('keywords')->implode(', ');

        return view('blog', compact('blogs','descriptions','keywords'));
    }

    public function blog_details($id)
    {
        $blog = BlogModel::find($id);
        return view('blog-details', compact('blog'));
    }

    public function insertComment(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Assuming you have a Comment model and a comments table
        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
