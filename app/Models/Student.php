<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['program_faculty_id', 'name', 'npm', 'birth', 'semester'];

    public function program_faculty()
    {
        return $this->hasOne(program_faculty::class, 'id', 'program_faculty_id');
    }

    public function payment()
    {
        return $this->hasMany(payment::class, 'npm', 'npm');
    }
}
