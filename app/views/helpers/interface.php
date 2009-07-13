<?php
/*
	How to use:
		* Add Configure::write('edlib.theme','theme_name_underscored'); to core.php to use theme other than default
	
	Requirements:
		* app/views/helpers/interface.php
		* app/vendors/interface_themes/default.php
		* app/vendors/interface_themes/other_themes.php
*/
class InterfaceHelper extends AppHelper
{
	var $name = 'Interface';
	var $Theme = null;
	
	function beforeLayout()
	{
		parent::beforeLayout();
	}
	
	function __loadTheme()
	{
		$theme = $this->getTheme();
		App::import('Vendor','interface_themes/default');
		App::import('Vendor','interface_themes/'.$theme);
		$className = Inflector::camelize($this->getTheme())."Theme";
		$d = new $className();
		$this->Theme = $d;
	}
	
	function getTheme()
	{
		if(!Configure::read('themeslib.theme'))
		{
			return "default";
		}
		else
		{
			return Configure::read('edlib.theme');
		}
	}
	
	public function __call( $method, $args )
	{
		$this->__loadTheme();
		return $this->Theme->$method($args);
	}

}
?>