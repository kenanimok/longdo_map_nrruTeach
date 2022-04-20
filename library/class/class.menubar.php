<?php
class unno_menubar
{
	var $menu_array;
	var $_current;

	
	function unno_menubar($current_page = '')
	{
		$this -> _current = $current_page;
		$this -> menu_array = array('left' => array(), 'right' => array());
	}

	function add_menu($_key, $_name, $_link, $_icon, $_size, $_locate)
	{

		($_locate == 'left')
			? $this -> menu_array['left'][] = array('key' => $_key, 'name' => $_name, 'link' => $_link, 'icon' => $_icon, 'size' => $_size)
			: $this -> menu_array['right'][] = array('key' => $_key, 'name' => $_name, 'link' => $_link, 'icon' => $_icon, 'size' => $_size);

	}


	function show()
	{
		$_left_count = count($this -> menu_array['left']);
		$_right_count = count($this -> menu_array['right']);

		if($_left_count == 0 && $_right_count == 0)
			return;
		
		echo '<table cellpadding=3 cellspacing=0 border=0 width=100%>' . "\n";
		echo '<tr>' . "\n";

		if($_left_count > 0)
		{
			$cx=  0;
			foreach($this -> menu_array['left'] as $_data)
			{
				echo '<td width="5" class="tabsplit">&nbsp</td>' . "\n";
				echo '<td width="' . $_data['size'] . '" class="' . ($this -> _current == $_data['key'] ? 'tabactive' : 'tabitem') . '"><a href="' . $_data['link'] . '"><img src="./image/icon/' . $_data['icon'] . '.png" width="16" height="16" border="0" align=absmiddle> ' . $_data['name'] . '</td>' . "\n";
			}
		}
		echo '<td class="tabsplit">&nbsp;</td>' . "\n";
		if($_right_count > 0)
		{
			$cx=  0;
			foreach($this -> menu_array['right'] as $_data)
			{
				echo '<td width="' . $_data['size'] . '" class="' . ($this -> _current == $_data['key'] ? 'tabactive' : 'tabitem') . '"><a href="' . $_data['link'] . '"><img src="./image/icon/' . $_data['icon'] . '.png" width="16" height="16" border="0" align=absmiddle> ' . $_data['name'] . '</td>' . "\n";
				echo '<td width="5" class="tabsplit">&nbsp</td>' . "\n";
			}
		}
		echo '</tr>' . "\n";
		echo '</table>' . "\n";
		echo '<table cellpadding=5 cellspacing=0 border=0 width=100%><tr><td class="tabpanel">' . "\n";

	}

	function show_footer()
	{
		echo '</td></tr></table>' . "\n";
	}
}
?>
