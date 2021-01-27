<?php

$r = $_REQUEST['r']; 
$g = $_REQUEST['g']; 
$b = $_REQUEST['b'];

if(dechex($r) === '0')
    $r = dechex($r) . '0';
else
    $r = dechex($r);

if(dechex($g) === '0')
    $g = dechex($g) . '0';
else
    $g = dechex($g);

if(dechex($b) === '0')
    $b = dechex($b) . '0';
else
    $b = dechex($b);

echo $r . $g . $b;