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
        $user = \Auth::user();
        return [
            'user'=>$user,
        ];
        //copy from action 'edit'
        $gag->likes_count = $gag->likes_count + 1;
        $gag->save();
        return [
            'likes_count' => $gag->likes_count
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
