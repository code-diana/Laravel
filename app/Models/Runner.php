<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Runner extends Model
{
    use HasFactory;
    protected $table="runners";
    protected $fillable=['name','last_name','adress','birth_date','sex','pro','federation_number','points'];
}
