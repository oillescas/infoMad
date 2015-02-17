<?php namespace App;

use Jenssegers\Mongodb\Model as Eloquent;
use Carbon;

class Evento extends Eloquent {

	protected $collection = 'eventos';
    protected $primaryKey = 'id_evento';
    protected $fillable = array('id_evento');
    protected $dates = array('fecha_evento','fecha_fin_evento');
    protected $casts = [
        'gratuito' => 'boolean',
        'evento_larga_duracion'=> 'boolean'
    ];

    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s.0';
    }

    public function getTipoAttribute($value)
    {
        $valores = explode('/',$value);
        return $valores[ count($valores)-1];
    }
}
