<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Validation\Rule;
use Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);


        $check = Auth::guard('admin')->attempt([
                    'email' => $request->email,
                    'password' => $request->password,
                ]);

        if(! $check){
            return response()->json(['message' => 'incorrect'], 401);
        }

        return response()->json(['message' => 'success']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back()->with('success', 'You have successfully logged out.');
    }

    public function profile()
    {
        return view('auth.profile');
    }

    public function updateProfile(Request $request)
    {
        $userId = auth()->user();

        $this->validate($request, [
            'name' => 'required|string|min:2',
            'email' => [
                'required',
                Rule::unique('users')->ignore($userId),
            ],
        ]);

        $user = User::whereId(auth()->user()->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);


        return redirect()->back()->with('success', 'You have successfully update your profile.');

    }
}
