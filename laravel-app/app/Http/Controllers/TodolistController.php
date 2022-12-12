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

    public function indexFilter(Request $request)
    {
        $checkbox = $request->input('showOpenTodos');

        if ($checkbox == 'on') {
            $todoLists = Todolist::where('done', false)->get();
        } else {
            $todoLists = Todolist::all();
        }

        return view('home', compact('todoLists'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);
        Todolist::create($data);
        
        return back();
    }


    public function update($id)
    {
        $todo = Todolist::findOrFail($id);
        $todo->done = !$todo->done;
        $todo->save();
        return back();
    }


    /*  public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    } */
}
