<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteList extends Model
{
    use HasFactory;

    protected $table = 'favorites'; 
    protected $fillable = ['product_id','user_id'];
}
