<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Idea $idea){
        
        $validated = $request->validate([
            "content"=> "required|min:3|max:240",
        ]);

        $validated['idea_id'] = $idea->id;
        $validated['user_id'] = auth()->id();

        Comment::create($validated);

        // $comment = new Comment([
        //     "user_id" => auth()->id(),
        //     "idea_id"=> $idea->id,
        //     "content"=> $request->content,
        // ]);

        // $comment->save();

        return redirect()->route("ideas.show", $idea->id)->with("success","Comment posted successfully!");
    }
}
