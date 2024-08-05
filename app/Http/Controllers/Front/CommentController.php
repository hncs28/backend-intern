<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\comment;

class CommentController extends Controller
{
    public function index() {
        $comments= comment::get(['commentID','Name','Comment']);
        return response()->json($comments);
    }
    public function store(Request $request) {
        $comment = new comment();
        $comment->Name = $request->input('Name');
        $comment->Comment = $request->input('Comment');
        $comment->save();
        
        // return response()->json($comment);

    }
}
