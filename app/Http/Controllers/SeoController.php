<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sitemap;
use Illuminate\Http\Request;
use URL;
use App\Evento;
class SeoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function sitemap()
	{
		$eventos = Evento::all();

        foreach ($eventos as $evento)
        {
            Sitemap::addTag(route('evento.show', $evento->id_evento), $evento->created_at, 'daily', '0.8');
        }
        return Sitemap::xml();
	}

}
