# ConfigurationManager
iMIS Client Configuration API

## Purpose
This application synchronizes the configuration specified in the root_customer script with the iMIS REST API

## How it works
Upon intepretation of either the uploadconfig or the downloadconfig script the autoloader of Guzzle and server.php are loaded.
The server.php specifies the location of the iMIS REST API.
The upload script parses the root_customer script and sends the data, formatted in JSON, to the REST API.
The download script does the exact same thing in reverse.