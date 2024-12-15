<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
    ];

    public function lecturers()
    {
        return $this->hasMany(Lecturer::class, 'id_prodi');
    }
}
