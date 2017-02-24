<?php

namespace shortener;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
	public $table = "urls";
	protected $fillable = ['long_url'];
	
	public function urls()
    {
        return $this->hasMany(Url::class);
    }
}
