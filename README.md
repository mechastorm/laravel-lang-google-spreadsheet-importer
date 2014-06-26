# Introduction

A Laravel (4.1 and above) package in an artisan command, which generates Laravel Languages files from a Google Spreadsheet.

It will

- read data from a spreadsheet formatted like [this](https://docs.google.com/a/mechaloid.com/spreadsheets/d/1GFQQ0clQRrYEM8_N0vyHeIIWqQdxJlbDe588uf_vlkU/edit#gid=0)
- outputs as Laravel Lang files like [these](https://github.com/mechastorm/google-spreadsheet-exporter/tree/master/examples/sample_output)

This library serves to simply interface with the Laravel framework. The bulk of the actual work is being done by key dependecies.

# Requirements

- Laravel >4.1
- PHP >5.4
- Composer Dependencies
    - [Google Spreadsheet Exporter](https://github.com/mechastorm/google-spreadsheet-exporter) - This is where the bulk of the logic lies. So majority of the documenation on the format of the spreadsheet and how it is being parse can be found there
    - [Google Spreadsheet API Client](https://github.com/asimlqt/php-google-spreadsheet-client)
    - [The official Google Api Client](https://github.com/google/google-api-php-client)
- A readable Google Spreadsheet
    - The Spreadsheet MUST be the new format (aka Google Sheets) to be compatible
    - Must be shared with the client email (further details on how to generate one below)

# Background

The aim is to

* Avoid hard coding copy text
* Reduce the dev cycle required when doing edits to copy text
* Nicely handle multiple translations of a copy text

Further background can be found under the [Google Spreadsheet Exporter](https://github.com/mechastorm/google-spreadsheet-exporter). Especially read up on setting up your Google API client credentials.

# Todo

- Finalize codebase via usage on a Laravel Application
- Documentaion
    - How to setup Google API credentials
    - Usage
    - Contributing
- PhpUnit Tests

# Installation

Installation is primary via composer.

Create a composer.json file in your project and add the following:

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/asimlqt/php-google-spreadsheet-client"
        },
        {
            "type": "vcs",
            "url": "https://github.com/mechastorm/google-spreadsheet-exporter"
        }
    ],
    "require": {
        "mechastorm/laravel-lang-google-spreadsheet-importer": "1.*"
    }
}
```

## 1. Add to service provider

Once you have the package installed you'll need to add it to your providers in `app/config/app.php`

Example

```php

'providers' => array(
    'Mechastorm\LaravelLangGoogleSpreadsheetImporter\LaravelLangGoogleSpreadsheetImporterServiceProvider',
),

```

Then confirm the artisan command exist by running `php artisan list` and check if there is a command for `google-spreadsheet:generate-lang` in the output.

## 2. Publish Configuration and Configure

It's recommended that you publish the packages configuration.

```shell
php artisan config:publish mechastorm/laravel-lang-google-spreadsheet-importer
```

You should open app/config/packages/mechastorm/laravel-lang-google-spreadsheet-importer/config.php and add in details on your spreadsheet and google api access. For details on what/how to add these configs, go to this main [readme](https://github.com/mechastorm/google-spreadsheet-exporter) for more info especially on getting Google API credentials.

It is strong recommended to do separate configurations per environment.

# Usage

Assuming you have already installed and configured it correctly, you can just run the artisan command to generate the language files

```shell

php artisan google-spreadsheet:generate-lang

```

or with enviroment

```shell

php artisan google-spreadsheet:generate-lang --env={env_name}

```

# Tests

Coming Soon!

# Contributors

- Shih Oon Liong (@mechastorm)

## License

Released under the [Apache 2.0 license](http://choosealicense.com/licenses/apache-2.0/).