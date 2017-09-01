Task
=========

A server has a Banner API, with a single endpoint.

The `BannerEndpoint` class should return JSON associated to a relevant ACTIVE `Banner` class.

Please implement the required ‘Banner’ class(es) and provide accompanying tests that match and verify the following specification.

Specs
----------

Response example
```
{"id":"b001","url":"https://mercari.com/lp/b001.html"}
```

The `BannerEndpoint` class should determine an ACTIVE `Banner` by the following:
* Each banner should be displayed during its display period
* Before the display period, a banner should be displayed if the user’s device has a specific IP address (whitelisted IP addresses)
	* The whitelisted IP addresses will be: 10.0.0.1 and 10.0.0.2 respectively
* If there are multiple banners that match the above conditions, the server should return the banner with the highest priority value.
* In any other case, no banner should be displayed
* Each banner instance should have the display period because a banner’s display period will change depending on the campaign.
* A display period of a banner should be passed in the form of Start Date/Time and End Date/Time, as ISO 8601 character strings
  * Ex: Start Date/Time = 2017-08-10T12:00:00+0100, End Date/Time = 2017-08-10T12:00:00+0100

Sample Dataset
----------

The following data structure should give you enough indication of a banner record:

| Banner ID | Banner URL                       | Time Range (UTC)     | Priority
| --------- | -------------------------------- | -------------------- | --------
| b001      | https://mercari.com/lp/b001.html | 4/1/2017-4/30/2017   | 10
| b002      | https://mercari.com/lp/b002.html | 5/1/2017-8/31/2017   | 10
| b003      | https://mercari.com/lp/b003.html | 3/1/2017-12/31/2017  | 5
| b004      | https://mercari.com/lp/b004.html | 10/1/2017-10/15/2017 | 20
| b005      | https://mercari.com/lp/b005.html | 4/15/2017-5/14/2017  | 20
