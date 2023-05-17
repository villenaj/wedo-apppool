<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refcitymun extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "refcitymun";

    protected $primaryKey = "id";
    protected $fillable = [
        'psgcCode',
        'citymunDesc',
        'regDesc',
        'provCode',
        'citymunCode',
    ];
    public $timestamp = false;
}
