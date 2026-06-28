<?php

namespace App\Http\Controllers;

use App\Models\MQCaseInstance;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class MQTipsController extends Controller
{
    #[OA\Get(
        path: "/api/check_tips",
        summary: "Check if tips are available and get them",
        security: [["bearerAuth" => []]],
        tags: ["Tips"],
        parameters: [
            new OA\Parameter(
                name: "Accept",
                in: "header",
                required: true,
                schema: new OA\Schema(type: "string", default: "application/json")
            ),
            new OA\Parameter(
                name: "instance_id",
                description: "Case instance id",
                in: "query",
                required: true,
                schema: new OA\Schema(type: "string"),
                example: '1'
            ),
        ],
        responses: [
            new OA\Response(response: 200, description: "Successful operation"),
            new OA\Response(response: 404, description: "Not found"),
            new OA\Response(response: 401, description: "Unauthorized"),
            new OA\Response(response: 403, description: "Forbidden"),
        ]
    )]
    public function checkTips(Request $request): Response
    {
        $validated = $request->validate([
            'instance_id' => 'required|integer',
        ]);

        $instance = MQCaseInstance::find($validated['instance_id']);
        $tips = $instance->mQCase->mQTips;

        $data = [];
        if (!$instance->started_at) {
            $data['message'] = 'The game not started yet';
            return response($data, ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
        }

        if ($instance->ended_at) {
            $data['message'] = 'The game ended';
            return response($data, ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
        }

        if ($instance->m_q_instance_state_id === 3) {
            $data['message'] = 'The game paused';
            return response($data, ResponseAlias::HTTP_METHOD_NOT_ALLOWED);
        }

        foreach ($tips as $tip) {
            if ($instance->started_at->addMinutes($tip->time)->isPast()) {
                $data[] = $tip;
            }
        }

        return response($data);
    }
}
