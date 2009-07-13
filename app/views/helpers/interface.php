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
		
	function __construct()
	{
		$this->__loadTheme();
		
		$this->helpers = $this->Theme->helpers;
		parent::__construct();
	}
	
	function __loadTheme()
	{
		if($this->Theme == null)
		{
			$theme = $this->getTheme();
			App::import('Vendor','interface_themes/default');
			App::import('Vendor','interface_themes/'.$theme);
			$className = Inflector::camelize($this->getTheme())."Theme";
			$d = new $className();
			$this->Theme = $d;
		}
	}
	
	function getTheme()
	{
		if(!Configure::read('themeslib.theme'))
		{
			return "default";
		}
		else
		{
			return Configure::read('themeslib.theme');
		}
	}
	
	public function __call( $method, $args )
	{
		$this->__loadTheme();
		
		// Helpers defined in Theme file are not loaded in
		// Theme object, only in InterfaceHelper object, so
		// we must now pass all the loaded helpers to the
		// Theme object that has been loaded.
		foreach($this->helpers as $i => $h)
		{
			$this->Theme->$h = $this->$h;
		}
		//print pr($this->Theme);die();
		return $this->Theme->dispatchMethod($method,$args);
	}

}
?>