<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class SPAController extends Controller
{
    public function __invoke()
    {
        return view('index');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect(url('/login/verified'));
    }
}
