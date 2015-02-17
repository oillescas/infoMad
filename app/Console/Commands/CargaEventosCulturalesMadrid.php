<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Evento;
use App\Services\ApiMadrid;

class CargaEventosCulturalesMadrid extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'carga:eventos';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(ApiMadrid $madrid)
	{
		parent::__construct();
		$this->madrid = $madrid;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire(){
		$this->comment("Arrancando la cachivacha...");
		$eventos = $this->madrid->getEventosCulturales();
		$n = 0;
		$u=0;
		foreach ($eventos as $evento) {
			$eventoDto = Evento::firstOrNew(array('id_evento' => $evento['id_evento']));
			if($eventoDto->id) {
				$u++;
				$this->comment("Actualizando ".$eventoDto->titulo." -> ". $eventoDto['id_evento']);
			}
			else{
				$n++;
				$this->comment("Creando ".$evento['titulo']." -> ". $evento['id_evento']);
			}
			foreach ($evento as $key => $value) {
				$eventoDto[$key] = $value;
			}
			$eventoDto->save();
			/* buscar y avisar si la instalacion no existe localizacion.id-instalacion */
		}
		$this->comment($n+$u." Eventos recuperados $n nuevos, $u actualizados");
	}
}
