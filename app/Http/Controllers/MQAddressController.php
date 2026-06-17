<?php

namespace App\Http\Controllers;

use App\Models\MQAddress;
use App\Models\MQCaseInstance;
use App\Models\UserMQAddressMQCaseInstance;
use ErrorException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use function PHPSTORM_META\map;
use Illuminate\Database\RecordNotFoundException;

class MQAddressController extends Controller
{
    #[OA\Get(
        path: "/api/addresses/{genre_id}",
        summary: "Get a list of addresses of a genre",
        tags: ["Addresses"],
        parameters: [
            new OA\Parameter(
                name: "genre_id",
                description: "Genre ID",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )],
        responses: [
            new OA\Response(response: 200, description: "Successful operation"),
        ]
    )]
    public function addresses(Request $request, int $genre_id): Response
    {
        $addresses = MQAddress::where('m_q_genre_id', $genre_id)->get();
        return response($addresses);
    }

    #[OA\Get(
        path: "/api/address_letters/{genre_id}",
        summary: "Get a list of address letter of a genre",
        tags: ["Addresses"],
        parameters: [
            new OA\Parameter(
                name: "genre_id",
                description: "Genre ID",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )],
        responses: [
            new OA\Response(response: 200, description: "Successful operation"),
        ]
    )]
    public function addressLetters(Request $request, int $genre_id): Response
    {
        $addresses = MQAddress::where('m_q_genre_id', $genre_id)->pluck('letter');
        return response($addresses);
    }

    #[OA\Get(
        path: "/api/address/{genre_id}",
        summary: "Get an exact address",
        security: [["bearerAuth" => []]],
        tags: ["Addresses"],
        parameters: [
            new OA\Parameter(
                name: "genre_id",
                description: "Genre ID",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer"),
                example: 1
            ),
            new OA\Parameter(
                name: "letter",
                description: "Address letter",
                in: "query",
                required: true,
                schema: new OA\Schema(type: "string"),
                example: "С"
            ),
            new OA\Parameter(
                name: "number",
                description: "Address number",
                in: "query",
                required: true,
                schema: new OA\Schema(type: "string"),
                example: '76'
            ),
            new OA\Parameter(
                name: "instance_id",
                description: "Case instance id",
                in: "query",
                required: true,
                schema: new OA\Schema(type: "string"),
                example: '76'
            ),
        ],
        responses: [
            new OA\Response(response: 200, description: "Successful operation"),
            new OA\Response(response: 404, description: "Not found"),
            new OA\Response(response: 401, description: "Unauthorized"),
            new OA\Response(response: 403, description: "Forbidden"),
        ]
    )]
    public function address(Request $request, int $genre_id): Response
    {
        $validated = $request->validate([
            'letter' => 'required|string',
            'number' => 'required|string',
            'instance_id' => 'required|integer',
        ]);

        $letter = $validated["letter"];
        $number = $validated["number"];
        $instance = $validated["instance_id"];

        try {
            $caseInstance = MQCaseInstance::where('id', $instance)->firstOrFail();
            $address = MQAddress::where('m_q_genre_id', $genre_id)
                ->where('letter', $letter)
                ->where('number', $number)
                ->firstOrFail();
        } catch (RecordNotFoundException) {
            return response(null, ResponseAlias::HTTP_NOT_FOUND);
        }

        try {
            $pivot = new UserMQAddressMQCaseInstance;
            $pivot->user_id = $request->user()->id;
            $pivot->m_q_address_id = $address->id;
            $pivot->m_q_case_instance_id = $caseInstance->id;
            $pivot->saveOrFail();
        } catch (UniqueConstraintViolationException) {
            // this is done on purpose
        }

        return response($address);
    }
}
