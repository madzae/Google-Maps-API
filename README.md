# Google-Maps-API

Simple PHP function to monitor Google Maps API usage

This function uses two databases: the first one to store and retrieve Google Maps API keys, and the second one to record API key usage.

Call, for example, this code to use your Google Maps API key. The request will then be stored in the database.

```php
require_once 'apikey.php';

use Madzae\GoogleMapsApiKey;
$obj = new GoogleMapsApiKey();

$obj->apiKeyDistanceMatrix();
```

To see how much you spend, call this:

```php
require_once 'apikey.php';

use Madzae\GoogleMapsApiKey;
$obj = new GoogleMapsApiKey();

$obj->apiUsage();
```

Enjoy!
