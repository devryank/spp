<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable = ['npm', 'amount'];

    public function student()
    {
        return $this->belongsTo(student::class);
    }

    public function payment()
    {
        return $this->belongsTo(payment::class);
    }
}
