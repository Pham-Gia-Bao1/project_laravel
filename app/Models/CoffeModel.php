<?php

namespace App\Models;

use App\Models\FavoriteList;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeModel extends Model
{
    use HasFactory;
    public $table = 'coffe';

    // public $appends = ['favorited'];

    // public function getFavoritedAttribute(){
    //     $favorited = FavoriteList::where(['product_id' => $this->id, 'user_id' => auth()->id()])->first();
    //     return $favorited ? true : false;
    // }
}