<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\CommentCreated;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(Comment::all());
    }

    public function store(Request $request)
    {
        $comment = Comment::create($request->all());

        event(new CommentCreated($comment));

        return response()->json($comment, 201);
    }
}
