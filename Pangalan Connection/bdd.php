<?php
try
{
	$bdd = new PDO('mysql:host=209.54.49.59;dbname=villgma57095com28607_;charset=utf8', 'evento', 'ceu123!@#');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>
