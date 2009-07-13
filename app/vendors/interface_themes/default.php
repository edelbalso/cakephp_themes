<?php

class DefaultTheme 
{
	var $name = 'Default';
	
	function open_box($args)
	{
		if(!$args) { $title = 'NONE'; }
		else { $title = $args[0]; }
		
		//print pr($title);die();
		$text = '<div class="box">' .
				'<h2>'.$title.'</h2>'.
				'<div class="block">';
		return $text;
	}

	function open_toggle_box($args)
	{
		App::import('Helper','Html');
		$html = new HtmlHelper();
		if(!$args) { $title = 'NONE'; }
		else { $title = $html->link($args[0],'#',array("id"=>'toggle-'.strtolower($args[0]))); }
		
		//print pr($title);die();
		$text = '<div class="box">' .
				'<h2>'.$title.'</h2>'.
				'<div class="block" id="'.strtolower($args[0]).'">';
		return $text;
	}

	function close_box()
	{
		return '</div>'."\n\t\t".'</div>';
	}
	
	function page_heading($args)
	{
		if(!$args) { $title = 'NONE'; }
		else { $title = $args[0]; }
		return '<h2 id="page-heading">'.$title.'</h2>';
		
	}
	
	function menu($args)
	{
		$menu = $args[0];
		
		$text = '<ul class="section menu">';
		foreach($menu as $mi => $submenu)
		{
			$text .= '<li>'.$mi;
			if($submenu)
			{
				$text .= '<ul class="submenu">';
				foreach($submenu as $smi)
				{
					$text .= '<li>'.$smi.'</li>';
				}
				$text .= '</ul>';
			}
			$text .= '</li>';
		}
		
		return $text;
	}
}
?>