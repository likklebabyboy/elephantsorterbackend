<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multimediaFile extends Model
{
    protected $fillable=[
         'file_name' ,
            'file_type' ,
    ];
   
    // use HasFactory;
}
