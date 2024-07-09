<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();

        return Inertia::render('Track/Index', [
            'tracks' => $tracks
        ]);
    }

    public function create()
    {
        dd('create');
    }
}
