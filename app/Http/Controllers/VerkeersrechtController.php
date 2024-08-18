<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

class VerkeersrechtController extends Controller
{
public function submitForm(Request $request)
{
    $request->validate([
        'captcha' => 'required|captcha',
        // other validations...
    ]);


// Process the form data
}
}
