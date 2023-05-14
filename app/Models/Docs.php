<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    protected $fillable = ['titre', 'description', 'chemin', 'theme_id'];
    use HasFactory;
}
