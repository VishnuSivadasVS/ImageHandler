<?php

namespace codeseasy\imagehandler;

/**
 *
 * @author Codes Easy <support@codeseasy.com>
 * @copyright Copyright (c), 2022 | VishnuSivadas.com
 * @license MIT public license 
 * @version 1.0
 * @link https://www.codeseasy.com
 * @package codeseasy\imagehandler
 *
 **/
class ImageHandler
{

    /**
     * Get remote image size
     *
     * @param string $url URL of the image
     * @return string returns a json string with size of image in bytes and other details about the image
     *
     **/
    public function getRemoteImageSize($url)
    {
        $imageInfo = getimagesize($url);
        $imageInfo = $this->getFileExt($imageInfo);
        $this->grabImage($url, $imageInfo);
        $temp_path = getcwd() . "/assets/temp-images/temp." . $imageInfo['ext'];

        $image_size = filesize($temp_path);
        $imageInfo['size'] = $image_size;
        return json_encode($imageInfo, JSON_PRETTY_PRINT);
    }

    /**
     * Download remote image file and store in temp folder
     *
     * @param array $imageInfo contains file extension and other details about the image
     *
     **/
    private function grabImage($url, $imageInfo)
    {
        $temp_path = getcwd() . "/assets/temp-images/temp." . $imageInfo['ext'];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $raw = curl_exec($ch);
        curl_close($ch);
        if (file_exists($temp_path)) {
            unlink($temp_path);
        }
        $fp = fopen($temp_path, 'x');
        fwrite($fp, $raw);
        fclose($fp);
    }


    /**
     * Get file extension
     *
     * @param array $imageInfo contains some details about the image
     * @return array contains file extension and other details about the image
     *
     **/
    private function getFileExt($imageInfo)
    {
        $mime = $imageInfo['mime'];
        $ext = explode('/', $mime);
        if ($ext[1] == '' || $ext[1] == null) {
            $ext = 'png';
        }
        $imageInfo['ext'] = $ext[1];
        return $imageInfo;
    }
}
