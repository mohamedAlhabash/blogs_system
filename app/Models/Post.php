<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use Sluggable;
    use HasFactory;
    protected $guarded = [];
    public function sluggable(): array
    {
        return[
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->belongsTo(Comment::class);
    }

}
