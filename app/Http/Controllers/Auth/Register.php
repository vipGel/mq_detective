<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use OpenApi\Attributes as OA;

class Register extends Controller
{
    #[OA\Post(
        path: "/api/register",
        summary: "Register a new user",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name", "email", "password", "password_confirmation"],
                properties: [
                    new OA\Property(
                        property: "name",
                        type: "string",
                        example: "John Doe"
                    ),
                    new OA\Property(
                        property: "email",
                        type: "string",
                        format: "email",
                        example: "john@example.com"
                    ),
                    new OA\Property(
                        property: "password",
                        type: "string",
                        example: "12345678"
                    ),
                    new OA\Property(
                        property: "password_confirmation",
                        type: "string",
                        example: "12345678"
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
            new OA\Response(
                response: 201,
                description: "Registration successful"
            ),
            new OA\Response(
                response: 422,
                description: "Validation error"
            )
        ]
    )]
    public function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

//        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
//            'token' => $token,
            'user' => $user,
        ], 201);
    }
}
