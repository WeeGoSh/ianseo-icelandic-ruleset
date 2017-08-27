<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

$source_dir = getcwd() . '/IS';
$destination_dir = dirname(dirname(getcwd())) . '/Sets/IS';

include('Common/Templates/head.php');

echo 'source: ' . $source_dir . '<br>';
echo 'destination: ' . $destination_dir . '<br>';

echo 'copying...<br>';
x_copy($source_dir, $destination_dir);
echo 'done<br>';

include('Common/Templates/tail.php');

function x_copy($source, $destination, $permissions = 0755)
{
    if (is_link($source)) {
        return symlink(readlink($source), $destination);
    }

    if (is_file($source)) {
        return copy($source, $destination);
    }

    if (!is_dir($destination)) {
        mkdir($destination, $permissions);
    }

    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }
        x_copy("$source/$entry", "$destination/$entry", $permissions);
    }

    $dir->close();
    return true;
}
