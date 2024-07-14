<?php

namespace App\Http\Controllers;

use App\Models\ApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = Auth::user()->apiKeys;
        return view('api_keys.index', compact('apiKeys'));
    }

    public function create()
    {
        return view('api_keys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Auth::user()->apiKeys()->create($request->only('name'));

        return redirect()->route('api_keys.index')->with('success', 'API Key created successfully.');
    }

    public function destroy(ApiKey $apiKey)
    {
        $this->authorize('delete', $apiKey);

        $apiKey->delete();

        return redirect()->route('api_keys.index')->with('success', 'API Key deleted successfully.');
    }
}
