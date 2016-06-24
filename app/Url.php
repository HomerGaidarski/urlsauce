<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['long_url'];

    public function urls()
    {
        return $this->hasMany(Url::class);
    }
}