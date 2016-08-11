<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{
    public function resetForm($token = null)
    {
        if (is_null($token)) {
            abort(404);
        }

        return view('auth.passwords.reset')->with('token', $token);
    }
}
