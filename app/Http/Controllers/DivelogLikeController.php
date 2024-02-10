<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divelog;

class DivelogLikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Divelog $divelog)
    {
      $divelog->liked()->attach(auth()->id());
      return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    
    public function destroy(Divelog $divelog)
    {
      $divelog->liked()->detach(auth()->id());
      return back();
    }
}
