<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidores extends Model
{
    use HasFactory;

    protected $fillable = ['imagen', 'host', 'ip', 'descripcion', 'orden'];
}
