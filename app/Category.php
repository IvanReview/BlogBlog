<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Category extends Model
{
    protected $fillable=['title', 'slug', 'parent_id', 'published', 'created_by', 'modify_by'];

    //Мутатор
    public function setSlugAttribute($value){
        $this->attributes['slug']=Str::slug(mb_substr($this->title, 0, 40)."-".\Carbon\Carbon::now()->format('Y-d-m H:i'),'-');
    }


    //для дерева категорий
    public function children(){
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    //Полиморфные связи получаем категорию связанную со статьей см. документацию
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categoryable');
    }


    public function scopeLastCategories($query, $count)
    {
        return  $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
