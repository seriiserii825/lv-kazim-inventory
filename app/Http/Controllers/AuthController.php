<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login', 'signup']]);
    }
    //, ['except' => ['login', 'signup']]

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|max:155',
            'password' => 'required|min:8',
        ]);

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function signup(AuthRegisterRequest $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);

        DB::table('users')->insert($data);

        return $this->login($request);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        try {
            auth()->logout();
            return response()->json(['message' => 'Successfully logged out']);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
            'user_email' => auth()->user()->email
        ]);
    }
}
