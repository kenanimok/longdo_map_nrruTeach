<?php
class unno_n4bar
{
	var $msg_array;
	var $_attention;
	var $_error;

	Function unno_n4bar()
	{
	}

	Function get_clear()
	{
		$this -> msg_array = array();
		$this -> _attention = 0;
		$this -> _error = 0;
		return true;
	}

	Function get_result($level)
	{
		$_result = true;
		switch($level)
		{
			case 'low': 
				if($this -> _error > 0) $_result = false;
				break;
			case 'high': 
				if($this -> _attention > 0) $_result = false;
				break;
		}
		return $_result;
	}

	Function get_javafunc()
	{
		return '<script language="JavaScript">' . "\n" . '<!-- ' . "\n" . 'function hiden4bar(target){' . "\n" . 'document.getElementById("n4bar_" + target).style.display = "none";' . "\n" . '}' . "\n" . '//-->' . "\n" . '</script>' . "\n";
	}

	Function get_botton($mode, $link)
	{
		switch($mode)
		{
			case 'confirm': 
				$_botton = '<a href="' . $link['yes'] . '"><img src="./image/botton/ok.gif" width="50" height="16" border="0" align=absmiddle></a> &nbsp; <a href="' . $link['no'] . '"><img src="./image/botton/cancel.gif" width="50" height="16" border="0" align=absmiddle></a>';
				break;
			case 'cancel': 
				$_botton = '<a href="' . $link['no'] . '"><img src="./image/botton/cancel.gif" width="50" height="16" border="0" align=absmiddle></a>';
				break;
		}
		return ' &nbsp; &nbsp; ' . $_botton;
	}

	Function add_msg($mode, $msg)
	{
		switch($mode)
		{
			case 'warning': 
				$this -> msg_array['warning'][] = $msg; 
				$this -> _attention += 1;
				break;
			case 'error': 
				$this -> msg_array['error'][] = $msg; 
				$this -> _attention += 2;
				break;
			case 'complete': 
				$this -> msg_array['complete'][] = $msg; 
				break;
			case 'info': 
				$this -> msg_array['info'][] = $msg; 
				break;
			case 'tipp': 
				$this -> msg_array['tipp'][] = $msg; 
				break;
		}
		return true;
	}

	Function msg_display()
	{
		$is_output = false;
		if(count($this -> msg_array) > 0)
			while(list($key, $value) = each($this -> msg_array))
			{
				$is_output = true;
				$_icon = 'lastpage';
				$_color = array('border' => '#000000', 'bg' => '#F2F2F2', 'text' => '#000000');

				switch($key)
				{
					case 'warning': 
						$_icon = 'warning';
						$_color = array('border' => '#FF9400', 'bg' => '#FFF5E6', 'text' => '#FF9400');
						break;
					case 'error': 
						$_icon = 'error';
						$_color = array('border' => '#FF0000', 'bg' => '#FFE6E6', 'text' => '#FF0000');
						break;
					case 'complete': 
						$_icon = 'okay';
						$_color = array('border' => '#19AD0A', 'bg' => '#E8F7E7', 'text' => '#19AD0A');
						break;
					case 'info': 
						$_icon = 'info';
						$_color = array('border' => '#1f56c6', 'bg' => '#e9eef9', 'text' => '#113072');
						break;
					case 'tipp': 
						$_icon = 'tipp';
						$_color = array('border' => '#ecd300', 'bg' => '#fdfbe6', 'text' => '#817604');
						break;
					default:
						$_icon = 'lastpage';
						$_color = array('border' => '#000000', 'bg' => '#F2F2F2', 'text' => '#000000');
						break;
				}

				$count_msg = count($value);
				echo '<div name="n4bar_' . $_icon . '" id="n4bar_' . $_icon . '"><table cellpadding=7 cellspacing=0 border=0 width=100% style="border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid; border-top: 1px solid; border-color: ' . $_color['border'] . '; margin-bottom: 5px; background-color: ' . $_color['bg'] . '">' . "\n";
					echo '<tr>' . "\n";
						echo '<td width=20 align=center><h5><img src="./image/icon/' . $_icon . '.png" width="16" height="16" border="0"></h5></td>' . "\n";
						echo '<td>' . "\n";
						$_margin = '';
						for($i = 0; $i < $count_msg; $i++)
						{
							if($i > 0) $_margin = '; margin-top: 5px';
							echo '<h5 style="color: ' . $_color['text']  . $_margin . '">- ' . $value[$i] . '</h5>' . "\n";
						}
						echo '</td>' . "\n";
						echo '<td width=20 align=center valign=top><h5><img src="./image/icon/drop.png" width="16" height="16" border="0" style="cursor: hand" onclick="hiden4bar(\'' . $_icon . '\')"></h5></td>' . "\n";
					echo '</tr>' . "\n";
				echo '</table></div>' . "\n";
			}
		if($is_output)
			echo '<table cellpadding=0 cellspacing=0 border=0 width=100%><tr><td height=5></td></tr></table>' . "\n";

		return true;
	}
}

?>
