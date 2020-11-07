<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    }

    /**
     * Handle an incoming login request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return $this->respondToUser();
        } else {
            return response()->json(['error' => 'User not found.'], 404);
        }
        return response()->json(['error' => 'No match for the email.'], 403);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(SignupRequest $request)
    {
        $user = $request->validated();
        if ($user) {
            User::create($user);
            if (Auth::attempt($user)) {
                return $this->respondToUser();
            } else {
                return response()->json(['error' => 'User created but couldn\'t logged in. Please login']);
            }
        } else {
            return response()->json(['error' => 'User cannot be created.']);
        }
    }

    /**
     * Logout the authenticated user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    protected function logout()
    {
        $this->guard()->logout();
        return response()->json(['success' => 'Successfully logged out.']);
    }

    /**
     * Get the authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    protected function respondToUser()
    {
        $user = $this->guard()->user()->only('name', 'email', 'created');
        return response()->json($user, 200);
    }

    /**
     * Get the authentication guard.
     *
     * @return \Illuminate\Support\Facades\Auth
     */
    public function guard()
    {
        return Auth::guard();
    }
}
