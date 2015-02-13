<?php namespace App;

use Jenssegers\Mongodb\Model as Eloquent;

class Centro extends Eloquent {

	 protected $collection = 'centros';
     protected $primaryKey = 'id-entidad';
     protected $fillable = array('id-entidad');

}
