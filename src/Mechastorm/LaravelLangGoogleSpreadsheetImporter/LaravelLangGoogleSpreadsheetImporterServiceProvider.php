<?php

namespace Mechastorm\LaravelLangGoogleSpreadsheetImporter;

use Illuminate\Support\ServiceProvider;

class LaravelLangGoogleSpreadsheetImporterServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('mechastorm/laravel-lang-google-spreadsheet-importer');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $registerId = 'google.spreadsheet.generate.lang';
		$this->app[$registerId] = $this->app->share(function($app) {
            return new Commands\LangGenerate($app);
        });

        $this->commands($registerId);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
