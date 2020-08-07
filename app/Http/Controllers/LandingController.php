<?php

namespace App\Http\Controllers;

use App\Marker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $markers = Marker::select('name', 'desc', 'coords');
        if (!Auth::user()) $markers = $markers->guest();
        return view('index', ['markers' => $markers->get()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request) {

        $result = Marker::where('name', 'like', '%'.$request->word.'%')
            ->orWhere('desc', 'like', '%'.$request->word.'%');
        if (!Auth::user()) $result = $result->guest();

        return view('search', ['markers' => $result->get()]);

    }
}
