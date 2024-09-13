<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products as Product;
use App\Models\SeoSetting;
use Illuminate\Support\Facades\Http;

class products extends Controller
{
    public function index()
    {
        $products = Product::all();
        $seoSettings = SeoSetting::all();

        $descriptions = $seoSettings->pluck('description')->implode(', ');
        $keywords = $seoSettings->pluck('keywords')->implode(', ');

        return view('products', compact('products','descriptions','keywords'));
    }

    public function product_details($id)
    {
        $products = Product::find($id);
        
        return view('product-details', compact('products'));
    }
}
