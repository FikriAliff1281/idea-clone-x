<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "content"=> "required|min:3|max:240",
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route("dashboard")->with("success", "Idea was created successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        $this->authorize('update', $idea);

        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        $this->authorize('update', $idea);

        $validated = $request->validate([
            "content"=> "required|min:3|max:240",
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success','Idea updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        return redirect()->route("dashboard")->with("success", "Idea deleted successfully");
    }
}
