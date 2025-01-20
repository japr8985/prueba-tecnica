<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date'
    ];

    protected function casts(): array
    {
        return [
            'due_date' => 'date:YYYY-MM-DD',
        ];
    }

    protected $dates = ['due_date'];

}
