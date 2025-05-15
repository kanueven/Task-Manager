<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{


    protected $table = 'tasks_tasks';
    //
    protected $fillable = [
        'description',
        'title',
        'user_id',
        'due_date',
        'status',
    ];
    protected $appends = ['calculated_status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function getCalculatedStatusAttribute()
{
    // If task has been marked as completed, show that
    if ($this->status === 'completed') {
        return 'completed';
    }

    $today = Carbon::today();
    $dueDate = Carbon::parse($this->due_date);

    if ($today->lt($dueDate)) {
        return 'pending';
    } elseif ($today->eq($dueDate)) {
        return 'in progress';
    } else {
        return 'overdue';
    }
}

}
