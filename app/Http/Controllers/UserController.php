<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.view')->with('userList', $users);
    }
    public function createUserView()
    {
        return view('user.create');
    }

    public function createNewUser(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users|email',

        ]);

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        if ($user->save()) {
            // return "success";
            return redirect('/')->with('success', 'Succesfully Added!!');
        } else {
            return redirect('/')->with('error', 'Something went wrong!!');
        }
    }
    public function editUserView($id)
    {
        $user = User::find($id);
        return view('user.edit')->with('user', $user);
        return $user;
    }
    public function updateUser(Request $request, $id)
    {


        $validatedData = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',




        ]);
        $mailCheck = User::where('email', $request->email)->get();

        $user = User::find($id);
        if (count($mailCheck) >= 1 && $user->email  != $mailCheck[0]->email) {
            // $fail('');
            return back()->with('error', $request->email.' is already Added!!');
        }

        // return view('user.edit')->with('user', $user);
        $user = User::find($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;

        if ($user->save()) {
            return redirect('/')->with('success', 'Succesfully Updated!!');
        } else {
            return redirect('/')->with('error', 'Something went wrong!!');
        }
        return $user;
    }
}
