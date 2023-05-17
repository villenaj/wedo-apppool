<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mdlapplicant extends Model
{
    use HasFactory;
    protected $table = "tbl_applicant";
    protected $primaryKey = "id";
    protected $fillable = [
        'first',
        'middle',
        'last',
        'suf',
        'gen',
        'citizen',
        'rel',
        'bdate',
        'stat',
        'mob',
        'eml',
        'prov',
        'ct',
        'brgy',
        'strt',
        'zip',
        'cntry',
        'chse',
        'posid',

    ];
    public $timestamp = true;
}
