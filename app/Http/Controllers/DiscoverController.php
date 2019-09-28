<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DB::table('recipes')->where('user_id', '!=', auth()->id())->get());
    }
}
