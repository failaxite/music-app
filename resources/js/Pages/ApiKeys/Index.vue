@extends('layouts.app')

@section('content')
<div class="container">
    <h1>API Keys</h1>
    <a href="{{ route('api_keys.create') }}" class="btn btn-primary">Create API Key</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Key</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apiKeys as $apiKey)
                <tr>
                    <td>{{ $apiKey->name }}</td>
                    <td>{{ $apiKey->key }}</td>
                    <td>
                        <form action="{{ route('api_keys.destroy', $apiKey) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
