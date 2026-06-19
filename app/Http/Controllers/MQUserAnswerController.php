<?php

namespace App\Http\Controllers;

use App\Models\MQUserAnswer;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use OpenApi\Attributes as OA;

class MQUserAnswerController extends Controller
{
    #[OA\Post(
        path: "/api/answer",
        summary: "Answer to question",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: "answer",
                        description: "Text of the answer",
                        type: "string",
                        example: "answer"
                    ),
                    new OA\Property(
                        property: "question_id",
                        description: "ID of a question",
                        type: "integer",
                        example: '1'
                    ),
                    new OA\Property(
                        property: "instance_id",
                        description: "Case instance id",
                        type: "integer",
                        example: '1'
                    ),
                ]
            )
        ),
        tags: ["Questions"],
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
            new OA\Response(response: 401, description: "Unauthorized"),
            new OA\Response(response: 405, description: "User can't answer twice to one question"),
        ]
    )]
    public function answer(Request $request): Response
    {
        $validated = $request->validate([
            'answer' => 'required|string',
            'question_id' => 'required|integer',
            'instance_id' => 'required|integer',
        ]);

        $answer = $validated['answer'];
        $questionId = $validated['question_id'];
        $instanceId = $validated['instance_id'];
        $user = $request->user();

        try {
            MQUserAnswer::create([
                'answer' => $answer,
                'm_q_question_id' => $questionId,
                'm_q_case_instance_id' => $instanceId,
                'user_id' => $user->id,
            ]);
        } catch (UniqueConstraintViolationException $e) {
            return response(null, ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
        }
        return response(null);
    }
}
