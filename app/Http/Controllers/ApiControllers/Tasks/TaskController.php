<?php

namespace App\Http\Controllers\ApiControllers\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Tasks\TaskRequest;
use App\models\Task;
use App\Http\Resources\TaskResourceCollection;
use App\Http\Resources\TaskDetailResource;

class TaskController extends Controller
{
    public function addTask(TaskRequest $request){
       
    	  $data=$request->validated();
          $result=Task::create($data);

    	    if ($result) {   	        
    	        return response([
    	            'message'=>'Task Added Successfully.',
    	            'status' =>'success'
    	        ]);
    	    }
    	        return response([
    	            'message'=>'Task Not Added.',
    	            'status' =>'error'
    	        ]);
    } 


    public function allTasks(){
  
          $result=Task::all();

            if ($result->isNotEmpty()) { 

                return TaskResourceCollection::collection($result);
            }
            return response([
                    'message'=>'Tasks Not Found.',
                    'status' =>'error'
            ]);
    } 

    public function taskDetail($id){

           $result=Task::find($id);

            if ($result) { 

                return new TaskDetailResource($result);
            }
            return response([
                    'message'=>'Task Not Found.',
                    'status' =>'error'
            ]);
    }

    public function updateTask(TaskRequest $request){

            $data=$request->validated();
            $result=Task::find($request->id);
            if ($result) { 
               Task::where('id',$request->id)->update($data);
               return response([
                    'message'=>'Task Updated Successfully.',
                    'status' =>'success'
               ]);
            }
            return response([
                    'message'=>'Task Not Found.',
                    'status' =>'error'
            ]);
    }

    public function deleteTask($id){

            $result=Task::find($id);
            if ($result) { 
               $result->delete();
               return response([
                    'message'=>'Task Deleted Successfully.',
                    'status' =>'success'
               ]);
            }
            return response([
                    'message'=>'Task Not Found.',
                    'status' =>'error'
            ]);
    }
}
