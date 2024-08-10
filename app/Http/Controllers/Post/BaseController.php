<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\PostService;

class BaseController extends Controller
{
    public PostService $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}
