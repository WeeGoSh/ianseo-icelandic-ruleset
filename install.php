<?php

// Verify location of files to copy
//
// Verify destination directory
//
// Copy files
//
// Report on progress

ini_set("display_errors", 1); error_reporting(E_ALL);

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');

$sourcedir = getcwd() . '/IS';
$destdir = dirname(dirname(getcwd())) . '/Sets/IS';

include('Common/Templates/head.php');

echo 'source: ' . $sourcedir . '<br>';
echo 'dest: ' . $destdir . '<br>';

echo 'copying...<br>';
xcopy($sourcedir, $destdir);
echo 'done<br>';

include('Common/Templates/tail.php');

function xcopy($source, $dest, $permissions = 0755)
{
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    if (is_file($source)) {
        return copy($source, $dest);
    }

    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        if ($entry == '.' || $entry == '..') {
            continue;
        }
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    $dir->close();
    return true;
}

?>
