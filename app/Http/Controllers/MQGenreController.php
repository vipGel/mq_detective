<?php

namespace App\Http\Controllers;

use App\Models\MQGenre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MQGenreController extends Controller
{
    public function genres(): Response
    {
        return response(MQGenre::all());
    }
}
