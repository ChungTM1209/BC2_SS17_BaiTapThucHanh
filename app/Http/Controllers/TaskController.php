<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = \App\Task::all();
        return view('task.list', compact('tasks'));
    }
    public function create(){
        return view('task.create');
    }
    public function store(Request $request){
        $task = new Task();
        $task->task_title = $request->input('task_title');
        $task->content = $request->input('content');
        $task->created_at = $request->input('created_at');

        if (!$request->hasFile('inputFile')) {
            $task->image = $request->inputFile;
        } else {
            $file = $request->file('inputFile');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->inputFileName;
            $newFileName = "$fileName.$fileExtension";
            $request->file('inputFile')->storeAs('public/images', $newFileName);
            $task->image = $newFileName;
        }
        $task->save();

        $message = "Tạo Task $request->task_title thành công!";
        Session::flash('create-success', $message);

        return redirect()->route('tasks.index', compact('message'));
    }
    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->task_title = $request->input('title');
        $task->content = $request->input('content');

        if ($request->hasFile('image')) {

            $currentImg = $task->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $task->image = $path;
        }

        $task->created_at = $request->input('due_date');
        $task->save();

        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $image = $task->image;

        if ($image) {
            Storage::delete('/public/' . $image);
        }

        $task->delete();

        Session::flash('success', 'Xóa thành công');
        return redirect()->route('tasks.index');
    }

}
