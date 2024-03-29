<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        $editing = false;

        return view("users.show", compact("user", "ideas" , "editing"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $ideas = $user->ideas()->paginate(5);

        return view("users.edit", compact("user", "ideas", "editing"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validated();

        if($request->has("image")){
            $imagePath = $request->file('image')->store('profile','public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }

        $user->update($validated);

        return redirect()->route("profile")->with("success","Profile Updated Successfully!");
    }


    public function profile()
    {
        return $this->show(auth()->user());
    }
}
