<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $albums = Album::with('votes')
            ->when($search, function ($query) use ($search) {
                $query->where('song_name', 'like', "%$search%");
            })
            ->orderBy('song_name')
            ->paginate(10);

        return response()->json($albums);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'song_name' => 'required|string|max:255',
            'artist_name' => 'required|string|max:255',
            'album_cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle album cover upload
        if ($request->hasFile('album_cover')) {
            $path = $request->file('album_cover')->store('albums', 'public');
            $validated['album_cover'] = Storage::url($path);
        }

        $album = Album::create($validated);

        return response()->json($album, 201);
    }

    public function destroy(Album $album)
    {
        $user = Auth::user();

        if (!$user || !$user->role == 'admin') {
            return response(['error' => 'Unauthorized'], 403);
        }

        $album->delete();
        return response(['message' => 'Album deleted']);
    }
}
