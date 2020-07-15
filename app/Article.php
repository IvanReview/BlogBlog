<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Support\Str;
class Article extends Model
{
    protected $fillable = ['title', 'slug', 'description_short', 'description', 'image',
        'image_show', 'meta_title', 'meta_description', 'meta_keyword', 'published', 'created_by', 'modified_by', 'user_id'];

    //формирование slug
    public function setSlugAttribute($value){
        $this->attributes['slug']=Str::slug(mb_substr($this->title, 0, 40)."-".\Carbon\Carbon::now()->format('dmyHi'),'-');
    }

    //Полиморфные связи получаем категорию связанную со статьей
    public function categories()
    {
        return $this->morphToMany('App\Category', 'categoryable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function scopeLastArticles($query, $count)
    {
        return  $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
