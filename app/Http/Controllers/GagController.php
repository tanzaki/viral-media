<?php

namespace App\Http\Controllers;

use App\Gag;
use App\User;
use Illuminate\Http\Request;

class GagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gag  $gag
     * @return \Illuminate\Http\Response
     */
    public function show(Gag $gag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gag  $gag
     * @return \Illuminate\Http\Response
     */
    public function edit(Gag $gag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gag  $gag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gag $gag)
    {
        //
    }

    public function dislike(Gag $gag) {
        /** @var User $user */
        $user = \Auth::user();
        $user->removeVotes($gag);
        $user->downVotes()->attach($gag);
        return $user->getVotes($gag);
    }

    public function like(Gag $gag)
    {
        /** @var User $user */
        $user = \Auth::user();
        $user->removeVotes($gag);
        $user->upVotes()->attach($gag);
        return $user->getVotes($gag);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gag  $gag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gag $gag)
    {
        //
    }
}
