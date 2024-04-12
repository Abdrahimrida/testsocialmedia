<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Thread::with("user")->get();
    }
    public function getThreadsForUser(Profile $profile)
    {
        return Thread::query()->with("profile")
            ->orderByDesc('profile.followers_count')
            ->orderByDesc('profile.likes_count')
            ->latest()
            ->whereIn('profile_id', function ($query) use ($profile) {
                $query->select('id')
                    ->from('profiles')
                    ->whereBetween('age', [$profile->min_age, $profile->max_age])
                    ->where('language', $profile->language)
                    ->where(function ($query) use ($profile) {
                        $query->where('city', $profile->city)
                            ->orWhere('country', $profile->country);
                    });
            })
            ->paginate(10);
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
    public function show(Thread $thread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        //
    }
}