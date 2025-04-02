<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition(): array
    {
        return [
            'song_name' => $this->faker->sentence(3), // Generates a random song name
            'artist_name' => $this->faker->name(), // Generates a random artist name
            'album_cover' => $this->faker->optional()->imageUrl(200, 200, 'music', true), // Random album cover or null
        ];
    }
}
