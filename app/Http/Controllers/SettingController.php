<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_master_key' => 'required',
            'new_master_key' => 'required'
        ]);

        // $validator = Validator::make($request->all(),[
        //         'current_master_key' => 'required',
        //         'new_master_key' => 'required'
        // ]);

        $file = file_get_contents(Storage::path('master_key.txt'));

        if($request->current_master_key != trim($file, "\n"))
        {
            return redirect()->back()->withErrors([
                'current_master_key' => 'Invalid Master Key'
            ]);
        }

        if($request->new_master_key != $request->confirmation_new_master_key){
            return redirect()->back()->withErrors([
                'confirmation_new_master_key' => 'New Master does not match'
            ]);
        }

        file_put_contents(Storage::path('master_key.txt'), $request->new_master_key);
        return redirect()->back()->with(['success' => 'Successfully changed master key']);
    }
}
