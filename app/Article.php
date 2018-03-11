<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['title', 'slug', 'description_short', 'description', 'image', 'image_show', 'meta_title', 'meta_description', 'meta_keyword', 'published', 'created_by', 'modified_by'];
    
    //Использование преобразователя (Mutator), для преобразования поля 'slug' перед записью в БД
    public function setSlugAttribute() {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40).'-'.\Carbon\Carbon::now()->format('dmyHi'), '-');
    }
    
    //Полиморфная связь с категориями
    public function categories() {
        return $this->morphToMany('App\Category', 'entity');
    }
    
    //Заготовка lastArticles()
    public function scopeLastArticles($query, $count) {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
