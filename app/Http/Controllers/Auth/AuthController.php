<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // public function __construct()
    // {

    //     $this->middleware('auth:api', ['except' => ['login', 'signup']]);
    // }

    /**
     * Handle an incoming login request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = $this->getUser();
            $token = $user->createToken('test')->plainTextToken;

            return $this
                ->respondToUserWithToken($token);
            //return response()->json($user, 200, ['x-auth-token' => [$this->respondWithToken($token)]]);
        } else {
            return response()
                ->json(['error' => 'Not found.'], 404);
        }
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
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = $this->getUser();
            $token = $user->createToken('test')->plainTextToken;
            return $this->respondToUserWithToken($token);
        } else {
            return response()->json(['error' => 'User created but couldn\'t logged in. Please login'], 404);
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
        Auth::guard()->logout();
        //$this->revokeToken($user);
        return response()->json('', 205);
    }

    // /**
    //  * Get the authenticated user.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // protected function respondToUser()
    // {
    //     $user = Auth::user()->only('name', 'email', 'created');
    //     return response()->json($user, 200);
    // }

    /**
     * Delete all of the users' issued tokens.
     *
     * @param  \App\User  $user
     */
    public function revokeToken(User $user)
    {
        return $user
            ->tokens()
            ->delete();
    }

    public function getUser()
    {
        return auth()->user();

    }
    /**
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function respondToUserWithToken($token)
    {
        return response()
            ->json(
                $this->getUser(),
                200,
                ['Authorization' => $token]);
    }

    // /**
    //  * Get the authentication guard.
    //  *
    //  * @return \Illuminate\Support\Facades\Auth
    //  */
    // public function guard()
    // {
    //     return Auth::guard();
    // }
}
