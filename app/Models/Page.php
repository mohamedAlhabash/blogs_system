<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use Sluggable;
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = [];
    public function sluggable(): array
    {
        return[
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function category(){
        return $this->belongsTo(Category::class ,'category_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class ,'user_id', 'id');
    }
    public function medias(){
        return $this->hasMany(PostMedia::class,'post_id', 'id');
    }
}
