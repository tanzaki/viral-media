<?php

namespace App\Http\Controllers;

use App\Gag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $gag_id = \request()->route('gag');
        $gag = Gag::find($gag_id);
        $gag->likes_count = $gag->likes_count + 1;
        $gag->save();
        echo $gag->likes_count;
    }
}
