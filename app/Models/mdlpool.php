<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mdlpool extends Model
{
    use HasFactory;
    protected $table = "account";

    protected $primaryKey = "id";

    protected $fillable = [
        'username',
        'password',
    ];
}
