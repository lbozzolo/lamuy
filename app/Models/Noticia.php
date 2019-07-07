<?php

namespace Lamuy\Models;

use Lamuy\Models\Entity as Entity;

class Noticia extends Entity
{
    public $fillable = [
        'title',
        'copete',
        'body',
        'type_id',
        'highlight',
        'user_id',
    ];

    public $table = 'noticias';

    public static $rules = [
        'title' => 'required|max:255'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_noticias');
    }

    public function type()
    {
        return $this->belongsTo(Noticia::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}