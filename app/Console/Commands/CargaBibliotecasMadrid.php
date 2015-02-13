<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use App\Centro;
use App\Services\ApiMadrid;

class CargaBibliotecasMadrid extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'carga:bibliotecas';

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
		$centros = $this->madrid->getBibliotecas();
		$n = 0;
		$u=0;
		foreach ($centros as $centro) {
			$centroDto = Centro::firstOrNew(array('id-entidad' => $centro['id-entidad']));
			if($centroDto->id) $u++;
			else $n++;
			foreach ($centro as $key => $value) {
				$centroDto[$key] = $value;
			}
			$centroDto->save();
		}
		$this->comment($n+$u." Centos recuperados $n nuevos, $u actualizados");
	}
}
