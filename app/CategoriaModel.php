<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    protected $table = 'categoria';
    protected $fillable = ['nome'];
    public $timestamps = false;
    protected $guarded = ['id'];
}
