<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['song_name', 'artist_name', 'album_cover'];

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function upvotes(): int
    {
        return $this->votes()->where('vote', 'up')->count();
    }

    public function downvotes(): int
    {
        return $this->votes()->where('vote', 'down')->count();
    }

    public function totalVotes(): int
    {
        return $this->upvotes() - $this->downvotes();
    }
}
