<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefreshTokenController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->server('HTTP_AUTHORIZATION')) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'status_code' => 200,
            'data' => [
                'access_token' => Auth::refresh(),
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => auth()->user()
            ]
        ]);
    }
}
