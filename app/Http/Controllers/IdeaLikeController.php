<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea){
        $liker = auth()->user();

        $liker->likes()->attach($idea);

        return redirect()->route("dashboard")->with("success","Liked Idea!");
    }

    public function unlike(Request $request){   
        $liker = auth()->user();

        $liker->likes()->detach($idea);

        return redirect()->route("dashboard")->with("success","Unliked Idea!");
    }
}
