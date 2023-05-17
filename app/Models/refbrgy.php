<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refbrgy extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "refbrgy";

    protected $primaryKey = "id";
    protected $fillable = [
        'brgyCode',
        'brgyDesc',
        'regCode',
        'provCode',
        'citymunCode',
    ];
    public $timestamp = false;
}
