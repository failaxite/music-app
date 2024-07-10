<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Str;

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
        return Inertia::render('Track/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255', 'string'],
            'artist' => ['required', 'min:5', 'max:255', 'string'],
            'display' => ['required', 'boolean'],
            'image' => ['required', 'image', 'max:10000'],
            'music' => ['required', 'file', 'mimes:mp3,wav', 'max:10000'],
        ]);

        $uuid = Str::uuid();

        $imageExtension = $request->image->extension();
        $imagePath = $request->image->storeAs('tracks/images', $uuid . '.' . $imageExtension);

        $musicExtension = $request->music->extension();
        $musicPath = $request->music->storeAs('tracks/musics', $uuid . '.' . $musicExtension);

        Track::create([
            'uuid' => $uuid, 
            'title' => $request->title,
            'artist' => $request->artist,
            'display' => $request->display,
            'image' =>$imagePath,
            'music' =>$musicPath,
        ]);

        return redirect()->route('tracks.index');
    }

    public function edit(Track $track)
    {
        return Inertia::render('Track/Edit', [
            'track' => $track,
        ]);
    }

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'title' => ['required', 'min:5', 'max:255', 'string'],
            'artist' => ['required', 'min:5', 'max:255', 'string'],
            'display' => ['required', 'boolean'],
        ]);

        $track->title = $request->title;
        $track->artist = $request->artist;
        $track->display = $request->display;
        $track->save();

        return redirect()->route('tracks.index');
    }

    public function destroy(Track $track)
    {
        $track->delete();

        return redirect()->route('tracks.index');
    }
}
