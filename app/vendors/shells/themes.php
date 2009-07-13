<?php
class ThemesShell extends Shell {
	
	var $uses = array('WaitingListEntry','DaycareParent','DaycareChild');
	
	function main() 
	{
		$this->_menu();
		
	}

	function _menu()
	{
		$choice = 'E';
		while($choice != 'Q')
		{
			$this->out('Themes Management Console');
			$this->hr();
			$this->out('[L]ist all themes in repository');
			$this->out('[Q]uit');		
			
			$choice = strtoupper($this->in("Choice : ",array('L','Q'),'L'));
			
			switch($choice)
			{

				case 'L':
					$this->_listThemesInRepository();
					break;
				case 'Q':
					break;
				default:
					$this->out(__('You have made an invalid selection.', true));
			}
		}
		
	}
	
	function _listThemesInRepository()
	{
		$this->out("Listing...");
	}
	
}
?>
