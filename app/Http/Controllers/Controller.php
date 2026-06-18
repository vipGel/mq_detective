<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[
    OA\Info(version: "0.0.1", description: "Multi Quest API Documentation", title: "API Docs"),
    OA\Server(url: 'http://localhost:8000', description: "Local Development Server"),
    OA\SecurityScheme(
    securityScheme: "bearerAuth",
        type: "http",
        bearerFormat: "Token",
        scheme: "bearer"
    )
]
abstract class Controller
{
    //
}
