<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Services\User\CommentService;

class CommentController extends Controller
{

    public function __construct(private CommentService $commentService)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request, int $blogId)
    {
        $user = auth()->user();
        $response = $this->commentService->store($request->only('content'), $blogId);
        return response()->json(['data' => $response, 'user' => $user]);
    }
}
