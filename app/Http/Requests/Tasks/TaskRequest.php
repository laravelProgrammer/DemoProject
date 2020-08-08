<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            'name'=>['required','string','max:255'],
            'assigned_to'=>['required','string','max:255'],
            'start_date_time'=>['nullable','date_format:Y-m-d H:i:s'],
            'due_date_time'=>['nullable','date_format:Y-m-d H:i:s','after:start_date_time'],

            'releated_to'=>['nullable',Rule::in([

                 'Organizations',
                 'Campaigns', 
                 'Cases', 
                 'Internal Tickets', 
                 'Invoices',
                 'Deals',
                 'Accounts',
                 'Leads']
            )],

            'related_to_ID'=>['nullable','integer'],

            'stage'=>['required',Rule::in([

                 'Pending',
                 'In Progress', 
                 'Completed', 
                 'Skipped', 
                 'Cancelled']
           )],

           'priority'=>['required',Rule::in([

                 'High',
                 'Medium', 
                 'Low']
           )],

           'location'=>['string','max:255'],
           'previous_task'=>['nullable','integer'],
           'parent_task'=>['nullable','integer'],

           'task_type'=>['required',Rule::in([

                 'Sale',
                 'Lead', 
                 'Training',
                 'General',
                 'Reminder',]
           )],

           'time_estimation'=>['nullable','integer'],
           'time_spent'=>['nullable','integer'],
           'related_task'=>['nullable','integer'],
           'description'=>['nullable'],

            
        ];
    }

    public function messages(){

        return [

            'related_to_ID.integer'=> 'The related to id must be an integer.'
        ];
    }
}
