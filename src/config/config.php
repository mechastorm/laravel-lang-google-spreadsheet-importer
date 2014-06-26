<?php

return array(
    'oauth' => array(
        /*
        |--------------------------------------------------------------------------
        | Google App Engine Application Name
        |--------------------------------------------------------------------------
        |
        | The name of your application on Google App Engine
        |
        */

        'application_name' => 'name_of_application',

        /*
        |--------------------------------------------------------------------------
        | Google App Engine Application Client ID
        |--------------------------------------------------------------------------
        |
        */

        'client_id' => 'service_account_client_id',

        /*
        |--------------------------------------------------------------------------
        | Google App Engine Application Client Email
        |--------------------------------------------------------------------------
        |
        | Make sure that this email has been made as at least a viewer on the spreadsheet
        |
        */

        'client_email' => 'service_account_client_email',

        /*
        |--------------------------------------------------------------------------
        | Google App Engine Application Private Key Certificate
        |--------------------------------------------------------------------------
        |
        | A file location
        |
        */
        'key_file_location' => 'location-to-your-private-key-p12-file',
    ),

    'spreadsheet' => array(

        /*
        |--------------------------------------------------------------------------
        | The name of the spreadsheet
        |--------------------------------------------------------------------------
        |
        | The name MUST be the same as it was named in Google Spreadsheet
        |
        */
        'name' => 'name_of_spreadsheet',

        /*
        |--------------------------------------------------------------------------
        | Supported Locales
        |--------------------------------------------------------------------------
        |
        | List of locales that are supported on the spreadsheet. These MUST already
        | exist as header columns in the spreadsheet
        |
        */
        'locales' => array(
            'en_US', // Must match the columns on the spreadsheet
        ),

        /*
        |--------------------------------------------------------------------------
        | Worksheet Names
        |--------------------------------------------------------------------------
        |
        | List of worksheets to process - MUST be the same as it was named in
        | Google Spreadsheet
        |
        */
        'worksheets' =>array(

        ),
    ),
);