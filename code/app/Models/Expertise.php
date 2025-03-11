<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;
    protected $fillable = [
        'expert_name','expert_name_th','expert_name_cn',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
