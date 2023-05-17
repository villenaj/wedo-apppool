<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mdlJD extends Model
{
    use HasFactory;
    protected $table = "jd";
    protected $primaryKey = "id";
    protected $fillable = [
        'pid',
        'desc'
      
    ];
    public $timestamp = true;
}
