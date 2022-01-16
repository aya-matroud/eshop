<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    protected $table = 'wishlists';
    protected $fillable = [ 'user_id', 'prod_id' ];

    public function products(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }
    //
}
