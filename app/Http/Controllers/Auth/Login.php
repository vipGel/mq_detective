<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OA;

class Login extends Controller
{
//    public function __invoke(Request $request)
//    {
//        // Validate the input
//        $credentials = $request->validate([
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        // Attempt to log in
//        if (Auth::attempt($credentials, $request->boolean('remember'))) {
//            // Regenerate session for security
//            $request->session()->regenerate();
//
//            // Redirect to intended page or home
//            return redirect()->intended('/')->with('success', 'Welcome back!');
//        }
//
//        // If login fails, redirect back with error
//        return back()
//            ->withErrors(['email' => 'The provided credentials do not match our records.'])
//            ->onlyInput('email');
//    }


    #[OA\Post(
        path: "/api/login",
        summary: "User login",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["email", "password"],
                properties: [
                    new OA\Property(
                        property: "email",
                        type: "string",
                        format: "email",
                        example: "test@test.com",
                    ),
                    new OA\Property(
                        property: "password",
                        type: "string",
                        example: "12345678",
                    ),
                ]
            )
        ),
        tags: ["Auth"],
        parameters: [
            new OA\Parameter(
                name: "Accept",
                in: "header",
                required: true,
                schema: new OA\Schema(type: "string", default: "application/json")
            ),
        ],
        responses: [
            new OA\Response(response: 200, description: "Successful operation"),
            new OA\Response(response: 401, description: "Invalid credentials"),
        ]
    )]
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = $request->user();

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
