<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $taken = Todo::all(); // Haal alle taken op uit de database
    return view('Todo', compact('taken')); // Stuur de data naar de view
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
    public function store(Request $request)
    {
        //
        $request->validate([
            'Task' => 'required|string|max:255',
        ]);


        Todo::create([
            'Task' => $request->input('Task'),
        ]);

        return redirect('/todo');
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
    public function edit($id)
    {
        $taak = Todo::find($id);

        if (!$taak) {
            return;
        }

        return view('edit', compact('taak'));
    }


    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $request->validate([
        'Task' => 'required|string|max:255',
    ]);

    $taak = Todo::find($id);
    if ($taak) {
        $taak->task = $request->input('Task');
        $taak->save();
    }
    return redirect()->route('Todo');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Todo::destroy($id);
        return redirect()->route('Todo');
    }



}
