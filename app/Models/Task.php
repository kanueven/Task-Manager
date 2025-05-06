<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks_tasks';
    //
    protected $fillable = [
        'description',
        'title',
        'user_id',
        'due_date',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
