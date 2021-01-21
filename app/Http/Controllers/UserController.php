<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        User::create($validatedData);
    }
}
