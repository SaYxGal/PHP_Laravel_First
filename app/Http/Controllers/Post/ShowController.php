<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ShowController extends BaseController
{
    public function __invoke(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('post.show', compact('post'));
    }
}
