<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Evento;
use Carbon;

class EventController extends Controller {

	private $evento;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Evento $evento){
		//$this->middleware('guest');
		$this->evento =  $evento;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$today = Carbon::today();
		$listaRelacionados = $this->evento->where('fecha_evento', $today)->get();
		return view('madrid.listaTipo', ['listaRelacionados'=>$listaRelacionados]);
	}

	public function showEvent($id){
		$infoEvento = $this->evento->find($id);
		$listaRelacionados = $this->evento->where('tipo',$infoEvento['tipo'])->get();
		return view('madrid.infoEvento', ['infoEvento'=>$infoEvento, 'listaRelacionados'=>$listaRelacionados]);
	}

	public function showEventTipo($tipo){
		$listaRelacionados = $this->evento->where('tipo','/contenido/actividades/'.$tipo)->get();
		return view('madrid.listaTipo', ['listaRelacionados'=>$listaRelacionados]);
	}

}
