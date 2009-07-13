<?php

class DefaultTheme extends Object
{
	var $name = 'Default';
	
	var $Html = null;
	
	var $helpers = array('Html','Javascript');
	
	function theme_css()
	{
		$text = $this->Html->css('reset',null, array('media'=>'screen')) . "\n";
		$text .= $this->Html->css('text',null, array('media'=>'screen')) . "\n";
		$text .= $this->Html->css('960',null, array('media'=>'screen')) . "\n";
		$text .= $this->Html->css('layout',null, array('media'=>'screen')) . "\n";
		$text .= $this->Html->css('nav',null, array('media'=>'screen')) . "\n\n";
		

		$text .=  '<!--[if IE 6]>' . $this->Html->css('ie6',null, array('media'=>'screen')) .'<![endif]-->' . "\n";
		$text .=  '<!--[if IE 7]>'. $this->Html->css('ie',null, array('media'=>'screen')) .'<![endif]-->' . "\n";

		return $text;
	}


	function theme_js()
	{
		// jQuery
		$text = $this->Javascript->link('jquery-1.3.2.min') ."\n";
		$text .= $this->Javascript->link('jquery-ui-1.7.2.custom.min') ."\n";
		
		// FLUID_960 demo stuff
		$text .= $this->Javascript->link('jquery-fluid16') ."\n";
		
		return $text;
	}

	function p($text)
	{
		return '<p>'.$text.'</p>';
	}
	
	function link( $title, $url = NULL, $htmlAttributes = array ( ), $confirmMessage = false, $escapeTitle = true )
	{
		return $this->Html->link( $title, $url, $htmlAttributes, $confirmMessage, $escapeTitle);
	}
	
	function header_div($title)
	{
		$text = '<div class="grid_12">' .
				'<h1 id="branding">' . $title . '</h1>' .
				'</div>';
		
		return $text;
	}
	function open_box($title = null)
	{
		
		//print pr($title);die();
		$text = '<div class="box">' .
				'<h2>'.$title.'</h2>'.
				'<div class="block">';
		return $text;
	}

	function open_toggle_box($title = null)
	{
		App::import('Helper','Html');
		$html = new HtmlHelper();
		if(!$title) { $title = 'NONE'; }
		else { $title = $html->link($title,'#',array("id"=>'toggle-'.strtolower($title))); }
		
		//print pr($title);die();
		$text = '<div class="box">' .
				'<h2>'.$title.'</h2>'.
				'<div class="block" id="'.strtolower($title).'">';
		return $text;
	}

	function close_box()
	{
		return '</div>'."\n\t\t".'</div>';
	}
	
	function page_heading($title = null)
	{
		if(!$title) { $title = 'NONE'; }
		return '<h2 id="page-heading">'.$title.'</h2>';
		
	}
	
	function menu($menu = array())
	{

		$text = '<ul class="section menu">';
		foreach($menu as $mi => $submenu)
		{
			$text .= '<li>'.$mi . "\n";
			if($submenu)
			{
				$text .= '<ul class="submenu">' . "\n";
				foreach($submenu as $smi)
				{
					$text .= '<li>'.$smi.'</li>' . "\n";
				}
				$text .= '</ul>' . "\n";
			}
			$text .= '</li>' . "\n";
		}
		$text .= '</ul>' . "\n";
		
		return $text;
	}
}
?>