<?php
/**
 * пример работы с файловым итератором
 * в цикле показывает номер строки и содержимое
 */


ini_set("auto_detect_line_endings", true);

require "../../vendor/autoload.php";

use Ns\FileStore\FileStoreIterator;

$it = new FileStoreIterator(__DIR__ . '/testfile.txt');

foreach ($it as $k=>$v)
{
     echo $k; echo "  ".$v;
}

