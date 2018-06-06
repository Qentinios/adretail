<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdretailController extends Controller
{
    /**
     * Gets jobs from text, returns them in order
     * @param Request $request
     * @return string
     */
    public function make(Request $request){
        $input = $request->input("jobs");

        // test
        $text = $input;

        return view('welcome', ['text' => $text]);
    }
}
