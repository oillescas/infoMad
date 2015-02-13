<?php namespace App\Http\Controllers;
use App\Evento;
use Httpful\Request;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
		$this->middleware('guest');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		//$salida = $this->centro->all();
		//print_r($salida);

		/*
		$centro = new Centro;
		$centro->name = 'John';
		$centro->save();

		echo 'salvado';
	*/


		//$uri = 'http://datos.madrid.es/portal/site/egob/menuitem.ac61933d6ee3c31cae77ae7784f1a5a0/?vgnextoid=00149033f2201410VgnVCM100000171f5a0aRCRD&format=xml&file=0&filename=200304-0-centros-culturales&mgmtid=fc8a034270603410VgnVCM1000000b205a0aRCRD';
		$uri = 'http://datos.madrid.es/portal/site/egob/menuitem.ac61933d6ee3c31cae77ae7784f1a5a0/?vgnextoid=00149033f2201410VgnVCM100000171f5a0aRCRD&format=xml&file=0&filename=206974-0-agenda-eventos-culturales-100&mgmtid=6c0b6d01df986410VgnVCM2000000c205a0aRCRD';
		$response = Request::get($uri)  // Will parse based on Content-Type
		    ->expectsXml()              // from the response, but can specify
		    ->send();                   // how to parse via expectsXml too.
		$xml = $response->body;

		//print_r($response);
		$listaContenido = array();
		foreach ($xml->children() as $contenido) {

			if($contenido->getName()!= 'infoDataset')
			{
				//print_r($contenido);
				//$objContenido = array();
				$objContenido = new Evento;
				//echo $contenido->tipo.'\n';
				$objContenido['tipo'] = (string)$contenido->tipo;
				foreach ($contenido->atributos as $attr) {
					//print_r($attr);
					$objContenido['idioma'] = (string)$attr['idioma'];
					foreach ($attr as $dato) {
						if((string)$dato['nombre'] == 'LOCALIZACION' || (string)$dato['nombre'] == 'DATOSCONTACTOS'){
							$objLocalizacion = array();
							foreach ($dato as $objLocal) {
									$objLocalizacion[strtolower($objLocal['nombre'])] = (string)$objLocal;
							}
							$objContenido[strtolower($dato['nombre'])] = $objLocalizacion;
						}else{
							$objContenido[strtolower($dato['nombre'])] = (string)$dato;
						}
					}
				}
				$objContenido->save();
				echo 'save '.$objContenido->nombre;
				$listaContenido[] = $objContenido;
			}
		}

 echo 'los datos ya han sido cargados';
	}

}
