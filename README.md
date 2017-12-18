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

## Official Lightspeed API compatibility
The base of the API class is the official API. Replacing this package with the Lightspeed package works without conflicts (unless you've extended the official class). This package is a standalone and doesn't extend anything.

### To-do
- Add resource names to all resource classes
- Cache some of the requests that wont change quite often (i.e. $api->languages->get() )
- Add a nice method to log errors. Should come in handy when using a queue worker
- Document the code
- Add data formatters to change array keys of the response easily

## Contributing
There are currently no code standards.

# License
This package is free for use. Selling the code is **not** allowed.