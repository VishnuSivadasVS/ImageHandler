<?php
require "src/ImageHandler.php";

use codeseasy\imagehandler\ImageHandler;

$url = "https://demo.codeseasy.com/assets/images/ImageHandler.jpg";

$imageHandler = new ImageHandler();
echo $imageHandler->getRemoteImageSize($url);
