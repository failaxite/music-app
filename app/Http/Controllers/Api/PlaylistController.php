<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $playlists = $user->playlists()->get();

        return response()->json($playlists);
    }
}
