<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function vote(Request $request, Album $album)
    {
        $validated = $request->validate([
            'vote' => 'required|in:up,down',
        ]);

        $user = Auth::user();
        $existingVote = Vote::where('album_id', $album->id)->where('user_id', $user->id)->first();

        if ($existingVote) {
            $existingVote->update(['vote' => $validated['vote']]);
        } else {
            Vote::create([
                'album_id' => $album->id,
                'user_id' => $user->id,
                'vote' => $validated['vote'],
            ]);
        }

        return response()->json(['message' => 'Vote recorded']);
    }
}
