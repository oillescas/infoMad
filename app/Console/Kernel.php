<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
		'App\Console\Commands\CargaCentrosCulturalesMadrid',
		'App\Console\Commands\CargaEventosCulturalesMadrid',
		'App\Console\Commands\CargaEventosBibliotecasMadrid',
		'App\Console\Commands\CargaBibliotecasMadrid'
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();

		$schedule->command('carga:centros')
				 ->daily()
				 ->sendOutputTo(storage_path().'/logs/inport.log')
				 ->emailOutputTo('oscar.illescas@gmail.com');

		$schedule->command('carga:bibliotecas')
				 ->daily()
				 ->sendOutputTo(storage_path().'/logs/inport.log')
				 ->emailOutputTo('oscar.illescas@gmail.com');

		$schedule->command('carga:eventos')
				 ->daily()
				 ->sendOutputTo(storage_path().'/logs/inport.log')
				 ->emailOutputTo('oscar.illescas@gmail.com');

		$schedule->command('carga:eventosb')
				 ->daily()
				 ->sendOutputTo(storage_path().'/logs/inport.log')
				 ->emailOutputTo('oscar.illescas@gmail.com');
	}

}
