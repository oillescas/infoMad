<?php namespace App;

use Jenssegers\Mongodb\Model as Eloquent;

class Evento extends Eloquent {

	protected $collection = 'eventos';
    protected $primaryKey = 'id-evento';
    protected $fillable = array('id-evento');

}
