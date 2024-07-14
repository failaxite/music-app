<?php

namespace App\Http\Controllers;

use App\Models\Apikey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiKeyController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $apikeys = $user->apikeys()->get();

        return Inertia::render('Keys/index', [
            'apikeys' => $apikeys,
        ]);
    }

    public function create()
    {
        return Inertia::render('Keys/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
        ]);

        $user = auth()->user();

        $user->apiKeys()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('Keys.index');
    }

    public function destroy(Apikey $apiKey)
    {
        $apiKey->delete();

        return redirect()->route('Keys.index');
    }


}