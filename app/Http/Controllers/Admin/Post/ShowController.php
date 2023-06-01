<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\BaseController;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ShowController extends BaseController
{
    public function __invoke(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.post.show', compact('post'));
    }
}
