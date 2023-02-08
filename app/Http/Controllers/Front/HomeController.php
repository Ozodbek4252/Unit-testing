<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('front.welcome');
    }

    public function deletePage(){
        return view('auth.delete');
    }

    public function delete(Request $request, $id){
        // get user
        $user = User::findOrFail($id);

        // check if the user is the same as the logged in user
        if($request->user()->id !== $user->id){
            abort(403);
        }

        // check if credentials are correct
        if(!\Hash::check($request->password, $request->user()->password)){
            return back()->withErrors([
                'password' => 'The provided password does not match your current password'
            ]);
        }

        // check if email is correct
        if($request->email !== $request->user()->email){
            return back()->withErrors([
                'email' => 'The provided email does not match your current email'
            ]);
        }

        // delete user
        $user->delete();

        // logout user
        auth()->logout();

        // redirect to home
        return redirect()->route('home');
    }
}
