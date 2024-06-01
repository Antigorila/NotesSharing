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
            FriendRequest::create([
                'user_id' => $friend->id,
                'from_user_id' => Auth::user()->id
            ]);

            return back();
        } 
        else 
        {
            return back();
        }
    }


    public function accept(FriendRequest $friendRequest)
    {
        Friend::create([]);
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
