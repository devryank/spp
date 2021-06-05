<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class program_faculty extends Model
{
    use HasFactory;

    protected $fillable = ['faculty_id', 'program_id'];

    public function program()
    {
        return $this->belongsTo(program::class);
    }

    public function student()
    {
        return $this->belongsTo(student::class);
    }
}
