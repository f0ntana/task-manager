<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    const STATUSES = [
        1 => ['name' => 'Em dia', 'color' => 'green'],
        2 => ['name' => 'Em risco', 'color' => 'yellow'],
        3 => ['name' => 'Atrasado', 'color' => 'red'],
    ];

    protected $fillable = [
        'client_id',
        'name',
        'status',
        'start',
        'end',
        'recorrency',
        'recorrency_value',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}