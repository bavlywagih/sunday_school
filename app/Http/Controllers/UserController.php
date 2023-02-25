<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\DB;



class UserController extends Controller
{

    public function users()
    {
        // dd(request('search'));
        if (request('search')) {
            // $users = User::all();
            $users = User::where('username', 'like', '%' . request('search') . '%')->orWhere('name', 'like', '%' . request('search') . '%')->orWhere('phone', 'like', '%' . request('search') . '%')->orWhere('address', 'like', '%' . request('search') . '%')->orWhere('nu_father', 'like', '%' . request('search') . '%')->get();
        }
        else {
            $users = User::all();
        }
        return view('user.user' ,compact('users'));
    }

    public function create()
    {
        return view('user.create.create-user');
    }

    public function user(Request $request)
    {
        $validated = $request->validate([
            'name' =>['required'],
            'username' => ['required'],
            'password' => ['required'],
            'phone' => ['required', 'numeric'],
            'birthday' => ['required', 'date'],
            'address' => ['required'],
            'facebook' => ['required'],
            'nu_father' => ['required' , 'numeric'],
            'our_father' => ['required'],
            'role' => ['required', 'numeric'],
        ]);
        user::create([
            'name' =>  $validated['name'],
            'username' =>  $validated['username'],
            'password' =>  $validated['password'],
            'phone' => $validated['phone'],
            'birthday' =>  $validated['birthday'],
            'address' =>  $validated['address'],
            'facebook' =>  $validated['facebook'],
            'nu_father' =>  $validated['nu_father'],
            'our_father' =>  $validated['our_father'],
            'role' =>  $validated['role'],
        ],);
        return redirect('/users');
    }

    public function tayo($id){
        $user = user::findorfail($id);
        return view('user.tayo.create',
        compact('user')
    );
    }

    public function information($id)
    {
        $user = user::findorfail($id);
        return view(
            'user.information.create',
            compact('user')
        );
    }

    public function information_update(Request $request, $id)
    {
        $validated = $request->validate([
            'address' => ['max:255'],
            'facebook' => ['max:255'],
            'nu_father' => ['required', 'numeric'],
            'our_father' => ['required'],
        ]);
        DB::table('users')->where('id', $id)->update([
            'address' =>  $validated['address'],
            'facebook' =>  $validated['facebook'],
            'nu_father' =>  $validated['nu_father'],
            'our_father' =>  $validated['our_father'],
        ]);
        return redirect('/users');
    }

    public function tayo_update(Request $request , $id){
        $validated = $request->validate([
            'tayo' => [ 'numeric'],
        ]);
        DB::table('users')->where('id', $id)->update(['tayo'  => $validated['tayo']]);
        return redirect('/users');
    }

}
