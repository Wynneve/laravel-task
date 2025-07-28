<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller {
    public function __invoke(Request $request) {
        return response()->json($request->user(), 200);
    }
}