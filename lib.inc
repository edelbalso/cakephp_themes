<?php
/*
 * Created on July 8, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

// ***********************************************************
// Include this file in the app/config/bootstrap.php to enable
// the code library in your cake application.
// DO NOT EDIT ANYTHING IN THIS FILE.
// ***********************************************************



// Load plugin config files, if they exist:
if(is_dir(APP . 'config' . DS . 'plugins'))
{
	$handler = opendir(APP . 'config' . DS . 'plugins');
	
	while ($file = readdir($handler)) {
		if ($file != '.' && $file != '..' && $file != 'CVS' && $file != '.svn')
			require_once(APP.'config'.DS.'plugins'.DS .$file);
	}
	
	closedir($handler);
}



// Save path of libraries, for includes.
$LIBPATHS[] = dirname(__FILE__);
foreach($LIBPATHS as $libPath):
	if (function_exists('ini_set')) {
		ini_set('include_path', ini_get('include_path') . ";" . $libPath);
	}
	else {
		//TODO: handle with ini_set not working
	}
endforeach;

if(!isset($modelPaths))
{
	$modelPaths = array(dirname(__FILE__) . DS .'app'.DS.'models'.DS);
}
else
{
	array_push($modelPaths, dirname(__FILE__) . DS.'app'.DS.'models'.DS);
}
if(!isset($behaviorPaths))
{
	$behaviorPaths = array(dirname(__FILE__) . DS .'app'.DS.'models'.DS.'behaviours'.DS);
}
else
{
	array_push($behaviorPaths, dirname(__FILE__) . DS.'app'.DS.'models'.DS.'behaviours'.DS);
}
if(!isset($controllerPaths))
{
	$controllerPaths = array(dirname(__FILE__) . DS .'app'.DS.'controllers'.DS);
}
else
{
	array_push($controllerPaths, dirname(__FILE__) . DS.'app'.DS.'controllers'.DS);
}
if(!isset($componentPaths))
{
	$componentPaths = array(dirname(__FILE__) . DS .'app'.DS.'controllers'.DS.'components'.DS);
}
else
{
	array_push($componentPaths, dirname(__FILE__) . DS.'app'.DS.'controllers'.DS.'components'.DS);
}
if(!isset($viewPaths))
{
	$viewPaths = array(dirname(__FILE__) . DS .'app'.DS.'views'.DS);
}
else
{
	array_push($viewPaths, dirname(__FILE__) . DS.'app'.DS.'views'.DS);
}
if(!isset($helperPaths))
{
	$helperPaths = array(dirname(__FILE__) . DS .'app'.DS.'views'.DS.'helpers'.DS);
}
else
{
	array_push($helperPaths, dirname(__FILE__) . DS.'app'.DS.'views'.DS.'helpers'.DS);
}
if(!isset($pluginPaths))
{
	$pluginPaths = array(dirname(__FILE__) . DS .'app'.DS.'plugins'.DS);
}
else
{
	array_push($pluginPaths, dirname(__FILE__) . DS.'app'.DS.'plugins'.DS);
}
if(!isset($vendorPaths))
{
	$vendorPaths = array(dirname(__FILE__) . DS .'app'.DS.'vendors'.DS);
}
else
{
	array_push($vendorPaths, dirname(__FILE__) . DS.'app'.DS.'vendors'.DS);
}


?>