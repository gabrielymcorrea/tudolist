<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function home(){
        //$tasks = Task::all();
        //ordanizando como vai mostra as tarefas, dessa forma em ordem decresente
        $tasks = Task::where('visible', 1)->orderBy('created_at', 'desc')->get();

        return view('home', ['tasks' => $tasks]);
    }

    //-----------------------------------------------------------------------------------
    public function new_task(){
        return view('new_task_frm');
    }

    //-----------------------------------------------------------------------------------
    public function new_task_submit(Request $request){
      
        $new_task = $request->input('text_new_task'); //ter acesso ao falor informado no input

        //salvando no banco de dados
        $task = new Task(); //new Task() é um instensão do models Task
        $task->task = $new_task; //task é do bando de dados
        $task->save(); //salvar

        //return to the main page
        return redirect()->route('home');
    }

    //-----------------------------------------------------------------------------------
    public function task_done($id){

        //update to the task -done
        $task = Task::find($id);
        $task->done = new \DateTime();
        $task->save();
        return redirect()->route('home');
    }

    //-----------------------------------------------------------------------------------
    public function task_undone($id){
        //update to the task -undone
        $task = Task::find($id);
        $task->done = null;
        $task->save();
        return redirect()->route('home');
    }

    //-----------------------------------------------------------------------------------
    public function edit_task($id){
        
        //get selected task
        $task = Task::find($id);
        //diplay edit task form
        return view('edit_task_frm', ['task' => $task]);     
    }

    //-----------------------------------------------------------------------------------
    public function edit_task_submit(Request $request){
        //get form inputs
        $id_task = $request->input('id_task');
        $edit_task = $request->input('text_edit_task');

        //update task
        $task = Task::find($id_task);
        $task->task = $edit_task;
        $task->save();

        //display tasks table
        return redirect()->route('home');
    }

    public function task_invisible($id){
        $task = Task::find($id);
        $task->visible = 0;
        $task->save();

        return redirect()->route('home');
    }

    public function task_visible($id){
        $task = Task::find($id);
        $task->visible = 1;
        $task->save();

        return redirect()->route('home');
    }

    public function list_invisibles(){
        $tasks = Task::where('visible', 0)->orderBy('created_at', 'desc')->get();

        return view('home', ['tasks' => $tasks]);
    }
}
