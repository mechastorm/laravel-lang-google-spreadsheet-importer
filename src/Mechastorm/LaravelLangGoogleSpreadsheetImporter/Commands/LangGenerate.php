<?php

namespace Mechastorm\LaravelLangGoogleSpreadsheetImporter\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Mechastorm\Google\ApiHelper;
use Mechastorm\Google\Spreadsheet\Data\Exporter;
use Mechastorm\Google\Spreadsheet\Data\FormatWriters\LangPhpWriter;
use Mechastorm\Google\Spreadsheet\Data\Transformers\LocalePhpArray;

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
        $this->info('==== Generating Laravel Language Files from Google Spreadsheet ===');
        $this->info('Current Enviroment: '. $this->app->environment());

        $accessToken = $this->getGoogleApiAccessToken();

        $spreadsheetSettings = $this->app['config']['laravel-lang-google-spreadsheet-importer::spreadsheet'];
        $gSSExporter = new Exporter(array(
            'access_token' => $accessToken,
            'spreadsheet_name' => $spreadsheetSettings['name']
        ));
        $gSSExporter->setWorksheets();

        $transformer = new LocalePhpArray(array(
            'locales' => $spreadsheetSettings['locales']
        ));
        $writer = new LangPhpWriter(array(
            'path' => $spreadsheetSettings['output'],
        ));

        $gSSExporter->processWorksheets(
            $spreadsheetSettings['worksheets'],
            $transformer,
            $writer
        );

        $this->info("Done - please check {$spreadsheetSettings['output']} for the files\n");
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
