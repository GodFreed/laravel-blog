<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];
    
    //Использование преобразователя (Mutator), для преобразования поля 'slug' перед записью в БД
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40).'-'.\Carbon\Carbon::now()->format('dmyHi'), '-');
    }
    
    //Отношение для поиска вложеных категорий
    public function children() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}