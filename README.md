# Lightspeed API Client
This package is a re-build of the official Lightspeed API (also know as seoshop API). The official API is quite limited. Difference between this package and the official package are the following:

- Make it possible to let the request sleep when it fails when there are too many requests
- Calculate resource items without manually calculating everything over and over again
- Throwing different exceptions for API Call limit reached and SleepTime difference which includes the HTTP response
- Clearer error messages
- Splitted the resource classes from the WebshopappApiClient

## Requirements
- PHP 7.1 or greater (Required in composer.json)
- Guzzle HTTP client 6.* or greater (Required in composer.json)

## Install
All you have to do is `composer require moldersmedia/lightspeedapi`

## Official Lightspeed API compatibility
The base of the API class is the official API. Replacing this package with the Lightspeed package works without conflicts (unless you've extended the official class). This package is a standalone and doesn't extend anything.

## Using the ApiAclient
You can construct the client by calling the class `MoldersMedia\LightspeedApi\Classes\Api\ApiClient`. The first parameter is the `$apiServer`, the second parameter is the `$apiKey` followed by the `$apiSecret` and the `$language`. The last parameter is the config which only accept an array. The array accepts the following array keys followed by their values:

```
$config = [
	'max_sleep_time'   => 5, 					// The maximum time that the sleep handler should wait. If the sleep time is 
												// smaller then the next available request, an exception will be thrown 
												
	'extra_sleep_time' => 'extraSleepTime', 	// This time will be added on the calculated sleep time. 
												// Sleep time formula is (next available request time + extra_sleep_time). Max sleep time has nothing to do with this config

	// Below is the same Lightspeed API config as in the constructor and official Lightspeed API
	'cluster'          => 'apiServer', 			
	'language'         => 'apiLanguage',
	'user_secret'      => 'apiSecret',
	'api_key'          => 'apiKey'
];
```

## Exception handling
There are 2 exceptions that will return the request data: `ApiClientException` and the `ApiLimitReachedException`. An clear error message will be given. For some more specific data you can use the following functions:

```
try {
	$api = ( new MoldersMedia\LightspeedApi\Classes\Api\ApiClient( 'eu', 'your_api_key', 'your_user_secret', 'nl' ) );
	
	$api->products->count();
} catch( MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException $exception ) {
	$exception->getResource(); // Return the resource that thrown the exception if available. In this example 'products'
	$exception->getWaitTime(); // Time that the next API call can be made
	$exception->getMessage(); // Gives the error message
	$exception->getPayload(); // The GET or POST parameters that are given
}
```

### To-do
- Add resource names to all resource classes
- Cache some of the requests that wont change quite often (i.e. $api->languages->get() )
- Add a nice method to log errors. Should come in handy when using a queue worker
- Document the code
- Add data formatters to change array keys of the response easily
- Calculate hourly and daily rate

## Contributing
There are currently no code standards.

# License
This package is free for use. Selling the code is **not** allowed.