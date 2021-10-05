<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    protected $with = ['permissions'];

    protected $fillable = [
        'name',
        'slug',
        'active'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function isActive()
    {
        return $this->active ? 'Ativo' : 'Desativado';
    }
}