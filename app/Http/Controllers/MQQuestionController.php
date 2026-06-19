<?php

namespace App\Http\Controllers;

use App\Models\MQQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;

class MQQuestionController extends Controller
{
    #[OA\Get(
        path: "/api/questions/{case_id}",
        summary: "Get a list of questions of a case",
        tags: ["Questions"],
        parameters: [
            new OA\Parameter(
                name: "case_id",
                description: "Case ID",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer"),
                example: '1'
            )],
        responses: [
            new OA\Response(response: 200, description: "Successful operation"),
        ]
    )]
    public function questions(Request $request, $case_id): Response
    {
        $questions = MQQuestion::where('m_q_case_id', $case_id)->get();
        return response($questions);
    }
}
