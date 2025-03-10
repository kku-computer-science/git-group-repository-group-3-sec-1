<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academicwork extends Model
{
    protected $fillable = [
        'ac_name',
        'ac_name_en',
        'ac_name_cn',
        'ac_type',
        'ac_type_en',
        'ac_type_cn',
        'ac_sourcetitle',
        'ac_sourcetitle_en',
        'ac_sourcetitle_cn',
        'ac_year',
        'ac_refnumber',
        'ac_page',
    ];
    use HasFactory;
    public function user()
    {
        return $this->belongsToMany(User::class,'user_of_academicworks')->withPivot('author_type');
    }

    public function author()
    {
        return $this->belongsToMany(Author::class,'author_of_academicworks')->withPivot('author_type');
        // OR return $this->hasOne('App\Phone');
    }
}
