<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DistritoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$listaDistritos = \DB::collection('centros')->select('tipo')->distinct()->get();
		$listaDistritos = \DB::collection('centros')->select('localizacion.distrito')->distinct()->get();
		//$listaDistritos = \DB::collection('eventos')->select('tipo')->distinct()->get();
		//dd($listaDistritos);
		return view('madrid.distritos.lista', ['listaDistritos'=>$listaDistritos]);
	}


}
