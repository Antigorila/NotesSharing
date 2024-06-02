<?php

namespace App\Http\Controllers;

use App\Models\JoinRequest;
use App\Http\Requests\StoreJoinRequestRequest;
use App\Http\Requests\UpdateJoinRequestRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class JoinRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('join_requests.index', ['join_requests' => JoinRequest::all()]);
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
    public function store(StoreJoinRequestRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        JoinRequest::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return view('welcome');
    }

    public function accept(JoinRequest $joinRequest)
    {
        User::create([
            'name' => $joinRequest->name,
            'email' => $joinRequest->email,
            'password' => $joinRequest->password
        ]);

        $joinRequest->delete();
        return view('join_requests.index');
    }

    public function decline(JoinRequest $joinRequest)
    {
        $joinRequest->delete();
        return view('join_requests.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JoinRequest $joinRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JoinRequest $joinRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJoinRequestRequest $request, JoinRequest $joinRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JoinRequest $joinRequest)
    {
        $joinRequest->delete();
        return back();
    }
}
