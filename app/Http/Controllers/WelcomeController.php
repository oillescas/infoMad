<?php namespace App\Http\Controllers;
use Httpful\Request;
use Response;
use App\Centro;
use App\Evento;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
	private $centro;
	private $evento;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Centro $centro, Evento $evento){
		//$this->middleware('guest');
		$this->centro =  $centro;
		$this->evento =  $evento;
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(){

		$listaContenido = $this->centro->all();
		return view('madrid.centros', ['listaContenidos'=>$listaContenido]);
	}


	public function showProfile($id){
		$infocentro = $this->centro->find($id);
		$listaEventos = $this->evento->where('localizacion.id-instalacion',$id)->get();
		//print_r($centro);
		return view('madrid.infocentro', ['listaEventos'=>$listaEventos, 'infoCentro'=>$infocentro]);
	}

	public function showEvent($id){
		$infoEvento = $this->evento->find($id);
		$listaRelacionados = $this->evento->where('tipo',$infoEvento['tipo'])->get();
		//print_r($centro);
		return view('madrid.infoEvento', ['infoEvento'=>$infoEvento, 'listaRelacionados'=>$listaRelacionados]);
	}

	public function showDistritos(){
		//$listaDistritos = \DB::collection('centros')->select('tipo')->distinct()->get();
		$listaDistritos = \DB::collection('centros')->select('localizacion.distrito')->distinct()->get();
		dd($listaDistritos);

	}

}

