<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data): void
    {
        $tags = $data['tags'];
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update(Post $post, $data): void
    {
        $tags = $data['tags'];
        if (array_key_exists('image', $data)) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
    }
}
