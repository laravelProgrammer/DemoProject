<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('assigned_to', 255);
            $table->dateTime('start_date_time')->nullable();
            $table->dateTime('due_date_time')->nullable();   
            $table->enum('releated_to', [               
                 'Organizations',
                 'Campaigns', 
                 'Cases', 
                 'Internal Tickets', 
                 'Invoices',
                 'Deals', 
                 'Accounts',
                'Leads'
            ])->nullable();   

            $table->bigInteger('related_to_ID')->nullable(); 

            $table->enum('stage', [               
                 'Pending',
                 'In Progress', 
                 'Completed', 
                 'Skipped', 
                 'Cancelled'
            ]);
            $table->enum('priority', [               
                 'High',
                 'Medium', 
                 'Low'
            ]);

            $table->string('location', 255)->nullable();
            $table->bigInteger('previous_task')->nullable();
            $table->bigInteger('parent_task')->nullable();

            $table->enum('task_type', [               
                 'Sale',
                 'Lead', 
                 'Training',
                 'General',
                 'Reminder', 
            ]);

            $table->integer('time_estimation')->nullable();
            $table->integer('time_spent')->nullable();
            $table->bigInteger('related_task')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
