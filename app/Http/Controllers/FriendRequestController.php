<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Http\Requests\StoreFriendRequestRequest;
use App\Http\Requests\UpdateFriendRequestRequest;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class FriendRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('friend_requests.index', ['user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('friend_requests.create', ['user' => Auth::user()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFriendRequestRequest $request)
    {
        $friend = User::where('email', $request->input('email'))->first();

        if ($friend !== null) 
        {
            $userId = Auth::user()->id;

            $existingFriendship = Friend::where(function ($query) use ($userId, $friend) {
                $query->where('user_id', $userId)
                      ->where('friend_id', $friend->id);
            })->orWhere(function ($query) use ($userId, $friend) {
                $query->where('user_id', $friend->id)
                      ->where('friend_id', $userId);
            })->exists();

            if ($existingFriendship) {
                return back();
            }

            FriendRequest::create([
                'user_id' => $friend->id,
                'from_user_id' => $userId
            ]);

            return view('friends.index', ['user' => Auth::user()]);
        } 
        else 
        {
            return back();
        }
    }


    public function accept(FriendRequest $friendRequest)
    {
        $friend = Friend::create([
            'user_id' => $friendRequest->user_id,
            'friend_id' => $friendRequest->from_user_id
        ]);
        
        $friendRequest->delete();
        return view('friend_requests.index');
    }

    public function decline(FriendRequest $friendRequest)
    {
        $friendRequest->delete();
        return view('friend_requests.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(FriendRequest $friendRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FriendRequest $friendRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFriendRequestRequest $request, FriendRequest $friendRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FriendRequest $friendRequest)
    {
        $friendRequest->delete();
        return back();
    }
}
