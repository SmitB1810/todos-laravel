<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function getData(){
        try {
            $tasks = Task::orderBy('id', 'desc')->get();
            return $tasks;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getDataParams($id){
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                return Task::find($id);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addData(Request $req) {
        try {
            $task = new Task;
            $task->taskTitle = $req->taskTitle;
            $task->description = $req->description;
            $task->save();
            return "Inserted Successfully!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateData($id, Request $req) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $task = Task::find($id);
                $task->taskTitle = $req->taskTitle;
                $task->description = $req->description;
                $task->save();
                return "Updated Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteData($id) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $task =Task::find($id)->delete();
                return "Deleted Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function startTime($id) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $task = Task::find($id);
                $task -> start_time = now();
                $task->save();
                return "Task Started";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function endTime($id) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $task = Task::find($id);
                $task -> end_time = now();
                $task->save();
                return "Task Ended!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
