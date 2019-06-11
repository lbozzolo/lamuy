<?php

namespace Lamuy\Models;

use Lamuy\Models\Entity as Entity;

class Type extends Entity
{
    public $table = 'types';

    public $fillable = [
        'name',
        'slug',
    ];

    public static $rules = [
        'name' => 'required|max:255'
    ];

    public function noticias()
    {
        return $this->hasMany(Noticia::class);
    }
}