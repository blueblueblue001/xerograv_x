<?php

namespace App\Http\Controllers;

use App\Models\Divelog;
use Illuminate\Http\Request;

class DivelogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // 🔽 追加
    $divelogs = Divelog::with('user')->latest()->get();
    return view('divelogs.index', compact('divelogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // 🔽 追加
    return view('divelogs.create');}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'divelog' => 'required|max:255',
      ]);
  
      $request->user()->divelogs()->create($request->only('divelog'));
  
      return redirect()->route('divelogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divelog $divelog)
    {
        return view('divelogs.show', compact('divelog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Divelog $divelog)
    {
        return view('divelogs.edit', compact('divelog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Divelog $divelog)
    {
        $request->validate([
          'divelog' => 'required|max:255',
        ]);
    
        $divelog->update($request->only('divelog'));
    
        return redirect()->route('divelogs.show', $divelog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Divelog $divelog)
    {
        $divelog->delete();
    
        return redirect()->route('divelogs.index');
    }
}
