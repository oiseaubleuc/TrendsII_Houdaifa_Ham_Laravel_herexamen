<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

class StrafrechtController extends Controller
{
public function submitForm(Request $request)
{
$request->validate([
'g-recaptcha-response' => 'required|captcha',
// other form fields validation rules
]);

// Process the form data
}
}
