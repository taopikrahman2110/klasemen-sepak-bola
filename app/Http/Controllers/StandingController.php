<?php

namespace App\Http\Controllers;

use App\Models\Standing;
use Illuminate\Http\Request;

class StandingController extends Controller
{
   
    public function index()
    {
        $standings = Standing::with('team')->orderBy('points', 'desc')->get();
        return view('standing.index', compact('standings'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Standing $standing)
    {
        //
    }

    
    public function edit(Standing $standing)
    {
        //
    }

   
    public function update(Request $request, Standing $standing)
    {
        //
    }

    public function destroy(Standing $standing)
    {
        //
    }
}
