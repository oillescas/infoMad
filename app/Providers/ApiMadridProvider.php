<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ApiMadrid;


class ApiMadridProvider extends ServiceProvider {
 	/**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('Madrid', function($app)
        {
            return new ApiMadrid();
        });
	}

}
