<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class AuthController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        return view('user.auth.index');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function check(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            sleep(1);

            return redirect()->route('user.dashboard');
        } else {
            return back()
                ->with('error', 'Email or Password is not valid.')
                ->onlyInput('email');
        }
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('user.auth.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => ['required', \Illuminate\Validation\Rules\Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ]
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        if ($user->save()) {
            return redirect()->back()
                ->with('success', 'Account has been successfully created!');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('user.login');
    }
}
