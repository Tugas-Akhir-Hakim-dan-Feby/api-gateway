<?php

namespace App\Http\Controllers;

use App\Http\Traits\ConstantUrls as Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    use Url;

    public function index(Request $request)
    {
        $users = Http::withToken($request->server('HTTP_AUTHORIZATION'))->get(Url::ApiUser(), $request);
        return response()->json($users->json());
    }

    public function store(Request $request)
    {
        $user = Http::withToken($request->server('HTTP_AUTHORIZATION'))->post(Url::ApiUser(), $request);
        return response()->json($user->json(), $user['status_code'] ?? 200);
    }

    public function show($id)
    {
        $user = Http::withToken(request()->server('HTTP_AUTHORIZATION'))->get(Url::ApiUser($id))->json();
        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = Http::withToken($request->server('HTTP_AUTHORIZATION'))->get(Url::ApiUser($id))->json();
        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }

        $user = Http::withToken($request->server('HTTP_AUTHORIZATION'))->put(Url::ApiUser($id), $request)->json();
        return response()->json($user, $user['status_code'] ?? 200);
    }

    public function destroy($id)
    {
        $user = Http::withToken(request()->server('HTTP_AUTHORIZATION'))->get(Url::ApiUser($id))->json();
        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }

        $user = Http::withToken(request()->server('HTTP_AUTHORIZATION'))->delete(Url::ApiUser($id))->json();
        return response()->json($user, $user['status_code'] ?? 200);
    }
}
