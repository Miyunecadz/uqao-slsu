<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required_with:username',
            'password' => 'required_with:current_password|confirmed'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->current_password != null)
        {
            if(!Hash::check($request->current_password, auth()->user()->password)){
                return redirect()->back()->withErrors(['current_password' => 'Invalid Current Password'])->withInput();
            }
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;

        // dd($request->all());
        if($request->password != null)
        {
            $user->password = Hash::make($request->new_password);
            // $user->password = $request->password;
        }
        $user->save();


        return redirect()->back()->with('success', 'Successfully updated!');
    }


}
