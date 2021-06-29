<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{

    public function index()
    {
        $admins = User::where('admin', '=', 1)->latest()->get();
        return view('admin.users.index')->with('admins', $admins);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function addAdmin(Request $request){
        $this->validate($request, [
            'email' => 'required|string|email',
        ]);

        if(User::where('email', '=', $request->email)->exists()){
            $user = User::where('email', '=', $request->email)->firstOrFail();

            $user->admin = 1;

            $user->save();

            session()->flash('success', 'Successfully changed '.$user->name.' permissions.');
            session()->flash('title', 'User');

            return  redirect()->route('admin.users.index');
        }else{
            session()->flash('info', 'User with email "'.$request->email.'" does not exist.');
            session()->flash('title', 'User');
            return  redirect()->back();
        }

    }

    public function removeAdmin($email){
        $user = User::where('email', '=', $email)->firstOrFail();

        $user->admin = 0;

        $user->save();

        session()->flash('success', 'Successfully changed '.$user->name.' permissions.');
        session()->flash('title', 'User');

        return  redirect()->back();
    }
}
