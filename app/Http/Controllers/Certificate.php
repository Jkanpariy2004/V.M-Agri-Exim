<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting;
use Illuminate\Http\Request;

class Certificate extends Controller
{
    public function index(){
        $seoSettings = SeoSetting::all();

        $descriptions = $seoSettings->pluck('description')->implode(', ');
        $keywords = $seoSettings->pluck('keywords')->implode(', ');

        return view('Certificate',compact('descriptions','keywords'));
    }
}
