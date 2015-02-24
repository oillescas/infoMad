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
				 ->dailyAt('11:15')
				 ->sendOutputTo(storage_path().'/logs/inport.log')
				 ->emailOutputTo('oscar.illescas@gmail.com');

		$schedule->command('carga:bibliotecas')
				 ->dailyAt('11:16')
				 ->sendOutputTo(storage_path().'/logs/inport2.log')
				 ->emailOutputTo('oscar.illescas@gmail.com');

		$schedule->command('carga:eventos')
				 ->dailyAt('11:17')
				 ->sendOutputTo(storage_path().'/logs/inport3.log')
				 ->emailOutputTo('oscar.illescas@gmail.com');

		$schedule->command('carga:eventosb')
				 ->dailyAt('11:18')
				 ->sendOutputTo(storage_path().'/logs/inport4.log')
				 ->emailOutputTo('oscar.illescas@gmail.com');
	}

}
