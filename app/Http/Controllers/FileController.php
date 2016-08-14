<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//use Input;
use Illuminate\Support\Facades\Input;
//use Validator;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function fileUpload()
    {
        return view('file._form');
    }

    public function fileSave(Request $request)
    {
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return 'erroree';
        }
        else {
       // $request->input('image');
        if (Input::file('image')->isValid()) {
            $destinationPath = 'uploads'; // upload path
            $extension = Input::file('image')->getClientOriginalExtension(
            ); // getting image extension
            $fileName = rand(
                    11111, 99999
                ) . '.' . $extension; // renameing image
            Input::file('image')->move(
                $destinationPath, $fileName
            ); // uploading file to given path
            // sending back with message
            //Session::flash('success', 'Upload successfully');
            //return Redirect::to('upload');
            echo 'success';
        } else {
            // sending back with error message.
            //Session::flash('error', 'uploaded file is not valid');
            // return Redirect::to('upload');
            echo 'unsuccess';
        }
    }
    }
}
