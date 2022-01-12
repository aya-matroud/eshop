<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use Sluggable;
    protected $table = 'categories';
    protected $fillable = [ 'name', 'slug', 'description', 'status', 'popular','image', 'meta_title','meta_desc','meta_keywords'];
    //
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
