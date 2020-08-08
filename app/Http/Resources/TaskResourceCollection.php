<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResourceCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'assigned_to' => $this->assigned_to,
            'start_date_time' => is_null($this->start_date_time) ? '0' : $this->start_date_time,
            'due_date_time' =>   is_null($this->due_date_time) ? '0' : $this->due_date_time,
            'releated_to' =>     is_null($this->releated_to) ? '0' : $this->releated_to,
            'related_to_ID' =>   is_null($this->related_to_ID) ? '0' : $this->related_to_ID,
            'stage' => $this->stage,
            'priority' => $this->priority,
            'location' =>        is_null($this->location) ? '0' : $this->location,
            'previous_task' =>   is_null($this->previous_task) ? '0' : $this->previous_task,
            'parent_task' =>     is_null($this->parent_task) ? '0' : $this->parent_task,
            'task_type' => $this->task_type,
            'time_estimation' => is_null($this->time_estimation) ? '0' : $this->time_estimation,
            'time_spent' =>      is_null($this->time_spent) ? '0' : $this->time_spent,
            'related_task' =>    is_null($this->related_task) ? '0' : $this->related_task,
            'description' =>     is_null($this->description) ? '0' : $this->description,
            'created_at' =>      date('d M Y',strtotime($this->created_at)),
            'task_detail' =>     route('task-detail',$this->id)
        ];
    }
}
