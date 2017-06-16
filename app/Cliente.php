<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = array('cliente_id','cliente_nombre','cliente_cedula','cliente_nit');
    protected $primaryKey = 'cliente_id';
}
