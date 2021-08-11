<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, Image;

class UserController extends Controller
{
    public function profile(){
        return view('pages.profile', [
            'user' => Auth::user()
        ]);
    }

    public function update_dp(Request $req){
        // Change DP/ Profile Photo

        if($req->hasFile('dp')){
            $dp = $req->file('dp');
            $filename = Auth::user()->name  . '-' . time() . $dp->getClientOriginalExtension();
            Image::make($dp)->resize(300,300)->save(public_path('/dist/dp/' . $filename ));
            
            Auth::user()->update([
                'dp' => $filename
            ]);
        }

        return view('pages.profile', [
            'user' => Auth::user()
        ]);

    }


    public function user_roles(){
        //
    }
}
