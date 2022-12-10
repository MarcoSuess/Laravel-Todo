<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;



class TodolistController extends Controller
{

    public function index()
    {
        $todoLists = Todolist::all();
        /* dd(compact('todoLists')); */
        return view('home', compact('todoLists'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);

        Todolist::create($data);
        return back();
    }


    public function update(Request $request, Todolist $todolist)
    {
        //
    }


    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
