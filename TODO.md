# TDD TODO

- Should return a json string
- The string should be of a specific format
- A banner data should always be returned except in specific circumstances


### Specification

The `BannerEndpoint` class should determine an ACTIVE `Banner` by the following:
* Each banner should be displayed during its display period
* Before the display period, a banner should be displayed if the user’s device has a specific IP address (whitelisted IP addresses)
	* The whitelisted IP addresses will be: 10.0.0.1 and 10.0.0.2 respectively
* If there are multiple banners that match the above conditions, the server should return the banner with the highest priority value.
* In any other case, no banner should be displayed
* Each banner instance should have the display period because a banner’s display period will change depending on the campaign.
* A display period of a banner should be passed in the form of Start Date/Time and End Date/Time, as ISO 8601 character strings
  * Ex: Start Date/Time = 2017-08-10T12:00:00+0100, End Date/Time = 2017-08-10T12:00:00+0100

