<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Contracts\View\View;

class TodoController extends Controller
{
    public function index(): View {
        $todos = Todo::get();
        return view('todoapp', compact('todos'));
    }

    public function addTodo(Request $res){
        Todo::insert($res->except("_token"));
        return redirect("todoapp");
    }

    public function changeState(Request $res){
        $todo = Todo::where("id" , $res->id);
        $todo->update(['completed' => !$todo->first()["completed"]]);
        return redirect("todoapp");
    }

    public function deleteCompleted(Request $res){
        Todo::where("completed", true)->delete();
        return redirect("todoapp");
    }
}
