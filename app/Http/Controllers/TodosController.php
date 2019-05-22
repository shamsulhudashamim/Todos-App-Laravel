<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;


class TodosController extends Controller
{
    public function index(){


    	//fetch all todos from database

    	//display them in the todos.index page
    	$todos = Todo::all();

    	return view('todos.index')->with('todos',$todos);
    }

    public function show(Todo $todo){
    	//die(var_dump($todoId)); used in php instead of dd($todoId);
    	//dd($todoId);
    	//$todo = Todo::find($todoId);
    	return view('todos.show')->with('todo',$todo);
    }


       public function create(){
       
        return view('todos.create');
    }

    public function store(){

        $this->validate(request(),['name'=>'required | min:6|max:12','description'=>'required']);

        $data = request()->all();
        //dd(request()->all());
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success','Todo Create Successfully.');

        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
       // $todo = Todo::find($todoId);
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
       $this->validate(request(),['name'=>'required | min:6|max:12','description'=>'required']);
        
        $data=request()->all(); 

        //$todo = Todo::find($todoId);
        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();


        session()->flash('success','Todo Updated Successfully.');

        return redirect('/todos');
    }

    public function destroy(Todo $todo)
    {

        //$todo = Todo::find($todoId);
        $todo->delete();

        session()->flash('success','Todo Deleted');

       return redirect('/todos'); 
    }
    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        session()->flash('success','todo completed successfully');
        return redirect('/todos');
    }
}
