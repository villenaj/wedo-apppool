<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mdlSkill extends Model
{
    use HasFactory;
    protected $table = "skill";
    protected $primaryKey = "id";
    protected $fillable = [
        'pid',
        'skill_desc'

    ];
    public $timestamp = true;
}
