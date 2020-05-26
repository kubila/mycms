<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  /**
   * Create a new AuthController instance.
   *
   * @return void
   */
  public function __construct()
  {

    $this->middleware('auth:api', ['except' => ['login', 'signup', 'logout']]);
  }

  /**
   * Get a JWT token via given credentials.
   *
   * @param  \Illuminate\Http\Request  $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if ($token = $this->guard()->attempt($credentials)) {
      return $this->respondWithToken($token);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
  }

  /**
   * Register a new user, if successfull then login it.
   */
  public function signup(SignUpRequest $request)
  {
    $user = $request->validated();
    if ($user) {
      User::create($user);
      if ($token = $this->guard()->attempt($user)) {
        $this->login($request);
        $this->respondWithToken($token);
        // decide what to do after registration, auto login or not?
      } else {
        return response()->json(['cant_login' => 'User created but cannot logged in, please login.']);
      }
    } else {
      return response()->json(['error' => 'User cannot validated.']);
    }
  }

  /**
   * Get the authenticated User
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function me()
  {
    return response()->json($this->guard()->user()->only(['email', 'name']));
  }

  /**
   * Log the user out (Invalidate the token)
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout()
  {
    $this->guard()->logout();

    return response()->json(['message' => 'Successfully logged out']);
  }

  /**
   * Refresh a token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh()
  {
    return $this->respondWithToken($this->guard()->refresh());
  }

  /**
   * Get the token array structure.
   *
   * @param  string $token
   *
   * @return \Illuminate\Http\JsonResponse
   */
  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => $this->guard()->factory()->getTTL() * 3600,
      'user' => $this->guard()->user()->name,
    ]);
  }

  /**
   * Get the guard to be used during authentication.
   *
   * @return \Illuminate\Contracts\Auth\Guard
   */
  public function guard()
  {
    return Auth::guard();
  }
}
