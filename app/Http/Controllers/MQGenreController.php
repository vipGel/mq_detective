<?php

namespace App\Http\Controllers;

use App\Models\MQGenre;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;

class MQGenreController extends Controller
{
    #[OA\Get(
        path: "/api/genres",
        summary: "Get a list of genres",
        tags: ["Genres"],
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
        ]
    )]
    public function genres(): Response
    {
        return response(MQGenre::all());
    }
}
