<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileUpdateController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }
    public function update(Request $request)
    {
        $user = Auth::user();  // select logged in user
        //validation
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'password'  => 'nullable|min:6|confirmed',
        ]);

        //compare to any changes
        $isChange = false;

        // check that if name field any changes
        if($request->name !== $user->name)
        {
            $user->name = $request->name;
            $isChange = true;
        }
        // check that if email field any changes
        if($request->email !== $user->email)
        {
            $user->email = $request->email;
            $isChange = true;
        }

        if($request->filled('password'))
        {
            $user->password = Hash::make($request->password);
            $isChange = true;
        }
        // if changes then data save and profile update
        if($isChange)
        {
            $user->save();
            return redirect()->back()->with('success','Profile Update Successfully');
        }

        // if no changes then redirect back and show this message
        return redirect()->back()->with('info','No Changes detected!');

    }
}

