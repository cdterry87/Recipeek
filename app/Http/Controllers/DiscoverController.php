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
        $recipe = new Recipe;
        return response()->json($recipe->where('user_id', '!=', auth()->id())->where('private', '!=', 1)->with('tags')->with('favorites')->get());
    }
}
