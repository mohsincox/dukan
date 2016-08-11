<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Hash;
use Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = DB::table('users')->get();
        return view('user.index', compact('users'));
    }

    public function changePasswordForm()
    {
        return view('user.change_password_form');
    }

    public function changePasswordStore(Request $request)
    {
        //return $request->all();
        $user = Auth::user();
        $rules = array(
            'old_password' => 'required|alphaNum|between:6,16',
            'password' => 'required|alphaNum|between:6,16|confirmed'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return Redirect::action('UserController@changePasswordForm',$user->id)->withErrors($validator);
        }
        else
        {
            if (!Hash::check(Input::get('old_password'), $user->password))
            {
                return 'eeeeeeeeeeerror';
            }
            else
            {
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                return "Password have been changed";
            }
        }
    }
}
