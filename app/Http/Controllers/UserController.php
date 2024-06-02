<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete all notes associated with the user
        foreach ($user->notes as $note) {
            $note->delete();
        }

        // Delete all friends relations where the user is the friend_id
        foreach ($user->friends as $relation) {
            $relation->delete();
        }

        // Delete all incoming friend requests
        foreach ($user->incoming_requests as $request) {
            $request->delete();
        }

        // Delete all outgoing friend requests
        foreach ($user->outgoing_requests as $request) {
            $request->delete();
        }

        // Check and delete all friend relations where the user is the user_id
        $friendRelations = \App\Models\Friend::where('user_id', $user->id)->orWhere('friend_id', $user->id)->get();
        foreach ($friendRelations as $relation) {
            $relation->delete();
        }

        // Delete the user
        $user->delete();

        return view('users.index', ['users' => User::all()]);
    }
}
