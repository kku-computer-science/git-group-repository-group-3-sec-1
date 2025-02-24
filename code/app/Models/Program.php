<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name_th','program_name_en','program_name_zh','degree_id','department_id'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
        
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function department()
    {
        return $this->belongsTo(department::class);
    }
}
