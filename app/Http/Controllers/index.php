<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting;
use Illuminate\Http\Request;

class index extends Controller
{
    function index()
    {
        $seoSettings = SeoSetting::all();

        $descriptions = $seoSettings->pluck('description')->implode(', ');
        $keywords = $seoSettings->pluck('keywords')->implode(', ');

        return view('index',compact('descriptions','keywords'));
    }
}
