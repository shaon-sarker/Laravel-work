<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoPost;

class TodoController extends Controller
{
    function index(){
        $todos = Todo::latest()->get();
        return view('admin.index', compact('todos'));
    }
    function insert(TodoPost $request){
        Todo::insert([
            'todo'=>$request->todo,
            'when'=>$request->when
        ]);
        return back()->with('success', 'Todo Added Succesfully');
    }
}
