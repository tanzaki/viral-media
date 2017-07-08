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

    public function like(Gag $gag)
    {
        /** @var User $user */
        $user = \Auth::user();
        $user->votes()->attach($gag);
        $gags_liked = $user->votes;
        //let try to dump  die $gags_liked
        $count_gags_liked = count($gags_liked);
        //let try to dump die $count_gags_liked
        if ($count_gags_liked > 0) {
            $is_liked = true;
        }else{
            $is_liked = false;
        }
        return [
            'user'=>$user,
            'is_user_liked'=>$is_liked
        ];
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
