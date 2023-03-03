<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensure extends Model
{
    use HasFactory;
    protected $fillable=['id_insurances','id_race','price'];
    
}
