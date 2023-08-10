<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'name', 
        'project_id',
        'auth_token',
        'space_url',
    ];

    public function validationRules()
    {
        return [
            'form.name' => ['required', 'string'],
            'form.project_id' => ['required', 'string'],
            'form.auth_token' => ['required', 'string'],
            'form.space_url' => ['required', 'string'],
        ];
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
