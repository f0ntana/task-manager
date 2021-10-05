<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const FREQUENCIES = [
        1 => 'Unico',
        2 => 'Diário',
        3 => 'Semanal',
        4 => 'Quinzenal',
        5 => 'Mensal',
        6 => 'Semestral',
        7 => 'Anual',
    ];

    protected $fillable = [
        'user_id',
        'responsible_id',
        'project_id',
        'status_id',
        'name',
        'description',
        'frequency',
        'due_date',
        'conclusion_date',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function responsible(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}