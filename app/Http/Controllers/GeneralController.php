<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function getcompany()
    {
        return General::all()->first();
    }
}
