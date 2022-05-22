# ImageHandler
A package to get remote image file size and other details

## Install the package using composer
```
composer require codeseasy/imagehandler
```
Require autoload.php
```php
require "vendor/autoload.php";
```

## Install without composer
```php
require "src/ImageHandler.php";
```

How to use:
```php
use codeseasy\imagehandler\ImageHandler;

$url = "https://demo.codeseasy.com/assets/images/ImageHandler.jpg";

$imageHandler = new ImageHandler();
echo $imageHandler->getRemoteImageSize($url);
```

Image size is in bytes.

Example Output:
```json
{
  "0": 640,
  "1": 427,
  "2": 2,
  "3": "width=\"640\" height=\"427\"",
  "bits": 8,
  "channels": 3,
  "mime": "image/jpeg",
  "ext": "jpeg",
  "size": 40329
}
```
