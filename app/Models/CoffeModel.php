<?php

namespace App\Models;

use App\Models\FavoriteList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeModel extends Model
{
    use HasFactory;
    public $table = 'coffe';
}
