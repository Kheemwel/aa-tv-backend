<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameData extends Model
{
    use HasFactory;
    protected $fillable = ['username', 'game_name', 'description', 'date_time'];
}
