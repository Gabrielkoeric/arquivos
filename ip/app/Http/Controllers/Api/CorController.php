<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    public function index()
    {
        return Cor::all();
    }
}
