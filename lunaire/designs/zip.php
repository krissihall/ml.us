<?php
  if (!function_exists('file_put_contents')) {
    function file_put_contents($filename, $content) {
      if ($fp = @fopen($filename, 'w')) {
        $result = fwrite($fp, $content);
        fclose($fp);
        return $result;
      } else {
        return false;
      }
    }
  }

  $filename = __FILE__;
  $zipfile = "$filename.zip";
  
  $data = file_get_contents(__FILE__);
  echo 'Loaded file (size: ' . strlen($data) . ').<br />';
  
  file_put_contents("compress.zlib://$zipfile", $data);
  echo 'Zipped file (new size: ' . filesize($zipfile) . ').<br />';

  $data = file_get_contents("compress.zlib://$zipfile");
  echo 'Original file size: ' . strlen($data) . '.';
?>