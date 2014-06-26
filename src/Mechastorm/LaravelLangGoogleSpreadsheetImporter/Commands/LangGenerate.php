<?php namespace Mechastorm\LaravelLangGoogleSpreadsheetImporter\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Mechastorm\Google\ApiHelper;

class LangGenerate extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'google-spreadsheet:generate-lang';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate Laravel Language files from Google Spreadsheet.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($app)
	{
		parent::__construct();

        $this->app = $app;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $this->info('Hello');
        $this->info('Current Enviroment: '. $this->app->environment());

        $accessToken = $this->getGoogleApiAccessToken();

        $this->info('Access Token: '.$accessToken);
	}

    private function getGoogleApiAccessToken()
    {
        $oauthSettings = $this->app['config']['laravel-lang-google-spreadsheet-importer::oauth'];
        $authResponse = ApiHelper::getAuthByServiceAccount(
            $oauthSettings
        );

        return $authResponse->access_token;
    }

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
