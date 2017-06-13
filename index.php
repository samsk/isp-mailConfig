<?php
include "config.php";

function autoload($name) {
	$name = str_replace('\\', '/', $name);	#'
	$class_path = dirname(__FILE__).'/include/classes/';
	static $class_extension = '.php';

	if(file_exists($class_path . $name . $class_extension))
		require_once($class_path . $name . $class_extension);
}
spl_autoload_register('autoload');

AutoConfig::addFile('/Autodiscover/Autodiscover.xml', 'ConfigOutlook');
AutoConfig::addFile('/mail/config-v1.1.xml', 'ConfigMozilla');
AutoConfig::setDefault('/Autodiscover/Autodiscover.xml');

try {
	$config = AutoConfig::get(isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '');
	$config->response();
} catch (Exception $e) {
	print "<b>" . $e->getMessage() . "</b>";
}

?>