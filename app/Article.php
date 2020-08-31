<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    protected $fillable = ['title','slug','body','category_id','thumbnail'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function getTakeThumbnailAttribute()
    {
        return "/storage/". $this->thumbnail;
    }
}
