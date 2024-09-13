<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter as news;

class Newsletter extends Controller
{
    function newsletter(Request $request){
        $request->validate([
            'email'=>'required'
        ]);

        $news= new news();
        $news->email = $request->input('email');
        $news->save();

        return redirect()->back()->with('success', 'You have Subscribed Succesfully.');
    }
}
