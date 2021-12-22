<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoPost;

class TodoController extends Controller
{
    function index(){
        $todo_show = Todo::latest()->get();
        return view('admin.index', compact('todo_show'));
    }
    function insert(TodoPost $request){
        Todo::insert([
            'todo'=>$request->todo,
            'when'=>$request->when
        ]);
        return back()->with('success', 'Todo Added Succesfully');
    }
    function edit($id){
        // $categories = Category::all();
        $todo_edit = Todo::find($id);
        return view('admin.edit', compact('todo_edit'));
    }
    // // function update(Request $request){
    // //     Subcategory::find($request->subcategory_id)->update([
    // //         'category_id'=>$request->category_id,
    // //         'subcategory_name'=>$request->subcategory_name,

    // //     ]);
    // //     return back()->with('update','update succesfully');
    // //   }
    function update(Request $request){
        // print_r($request->all());
        // die();
        Todo::find($request->id)->update([
            'todo'=>$request->todo,
            'when'=>$request->when,
        ]);
        return back()->with('update', 'update succesfully');
    }

    function delete($id){
        Todo::find($id)->delete();
        return back()->with('delsuccess', 'Category Delete Successfully');

    }
}
