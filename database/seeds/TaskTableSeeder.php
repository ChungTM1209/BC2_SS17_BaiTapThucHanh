<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task();
        $task->id               = 13;
        $task->task_title            = "Công việc 1";
        $task->content          = "Nội dung công việc 1";
        $task->image            = "";
        $task->created_at         = "2018-09-15";
        $task->save();
        $task = new Task();
        $task->id               = 14;
        $task->task_title            = "Công việc 2";
        $task->content          = "Nội dung công việc 2";
        $task->image            = "";
        $task->created_at         = "2018-09-16";
        $task->save();
        $task = new Task();
        $task->id               = 15;
        $task->task_title            = "Công việc 3";
        $task->content          = "Nội dung công việc 3";
        $task->image            = "";
        $task->created_at         = "2018-09-17";
        $task->save();
    }
}
