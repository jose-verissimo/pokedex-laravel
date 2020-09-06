<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    /**
     * Settings.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function settings(Request $request)
    {
        return view('pages.user.settings', [
            'user' => $request->user()
        ]);
    }
    
    /**
     * Edit and save user details.
     *
     * @param Illuminate\Http\Request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request)
    {
        // $params = $request->request->parameters;

        // Get logged in user.
        $user = $request->user();

        // Change variables.
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->character = $request->input('character');
        

        // Save user.
        $user->save();

        return redirect('settings');
    }
}
