<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::doesntHave('patchwork')->paginate(10);
        return view('comment.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comment::create($request->all());
        if ($request->patchwork_id)
            return redirect()->route('patchwork.show', [$request->patchwork_id, '#comments' ]);
        return redirect()->route('comment.index');
    }
}
