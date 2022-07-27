<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChainController extends Controller
{
    public function index(Request $request)
    {
        Storage::disk('local')->put('/images/content', $request->file('demo'));

        return response()->json(['success' => true]);
    }
}
