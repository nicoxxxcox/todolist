<?php

ob_start();


echo "<h1>Hello world</h1>";

ob_start();

echo "<h1>Hello world en plus </h1>";


$out = ob_get_contents();

echo $out;