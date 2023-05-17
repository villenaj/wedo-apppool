<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    use HasFactory;
    protected $table = "tbl_position";

    protected $primaryKey = "id";
    protected $fillable = [
        'pos',
        'vac',
        'status',
    ];
    public $timestamp = true;
}
