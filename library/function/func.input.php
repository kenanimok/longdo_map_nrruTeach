<?php
# =====================================
# Function _input -> right ถ้าเป็นจิง จะเปิดให้กรอก
# Mode : text -> properties = array('width' => ความกว้าง), 
# Mode : textarea -> properties = array('width' => ความกว้าง, 'height' => ความสูง), 
# Mode : radio -> properties = array('data' => ข้อมูลเป็น Array), 
# Mode : list -> properties = array('width' => ความกว้าง, 'data' => ข้อมูลเป็น Array), 

Function _input($mode, $var, $fix, $properties, $right = true, $error = false)
{
	global $_color;
	switch($mode)
	{
		case 'text':
			if($right)
			{
				$_stye = '';
				$_option = (isset($properties['option'])) ? $properties['option'] : '';
				$border_color = ($error) ? 'red' : $_color['dark'];

				if(isset($properties['max'])) $_option .= ' maxlength="' . $properties['max'] .'"';
				if(isset($properties['align'])) $_stye .= '; text-align: ' . $properties['align'];

				return '<input type="text" class="form-control" id="input" name="' . $var . '" value="' . $fix . '" style="width : ' . $properties['width'] . 'px; background-color: #FFFFFF; border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid; border-top: 1px solid; border-color: ' . $border_color . ';">';
			}
			else
			{
				return '<input type="hidden" name="' . $var . '" value="' . $fix . '">' . "\n" . $fix;
			}
			break;

		case 'password':
			if($right)
			{
				$_option = (isset($properties['option'])) ? $properties['option'] : '';
				$border_color = ($error) ? 'red' : $_color['dark'];
				return '<input type="password" name="' . $var . '" value="' . $fix . '" style="width : ' . $properties['width'] . 'px; height : 18px ; background-color: #FFFFFF; border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid; border-top: 1px solid; border-color: ' . $border_color . '; font-size: 10px; font-weight: normal"' . $_option . '>';
			}
			else
			{
				return '<input type="hidden" name="' . $var . '" value="' . $fix . '">' . "\n" . $fix;
			}
			break;

		case 'file':
			if($right)
			{
				$_option = (isset($properties['option'])) ? $properties['option'] : '';
				$border_color = ($error) ? 'red' : $_color['dark'];
				return '<input type="file" name="' . $var . '" style="width : ' . $properties['width'] . 'px; height : 18px ; background-color: #FFFFFF; border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid; border-top: 1px solid; border-color: ' . $border_color . '; font-size: 10px; font-weight: normal"' . $_option . '>';
			}
			else
			{
				return '<input type="hidden" name="' . $var . '" value="' . $fix . '">' . "\n" . $fix;
			}
			break;

		case 'textarea':
			if($right)
			{
				$border_color = ($error) ? 'red' : $_color['dark'];
				return '<textarea name="' . $var . '" style="width : ' . $properties['width'] . 'px ; height : ' . $properties['height'] . 'px; background-color: #FFFFFF; border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid; border-top: 1px solid; border-color: ' . $border_color . '; font-family: MS Sans Serif ; font-size: 10px; font-weight: normal">' . $fix . '</textarea>';
			}
			else
			{
				return '<input type="hidden" name="' . $var . '" value="' . $fix . '">' . "\n" . '<div style="width : ' . $properties['width'] . 'px ; height : ' . $properties['height'] . 'px margin: 5px">' . $fix . '</div>';
			}
			break;

		case 'check':
			$_chk = ($fix) ? ' checked' : '';


			if($right)
			{
				$data_return = '';
				for($i = 0; $i < count($properties['data']); $i++)
				{
					$data_return .= '<div onclick=' . $var . '.click() style="cursor: hand"><input name="' . $var . '" type="checkbox" value="' . $properties['data'][$i]['key'] . '"';
					if($properties['data'][$i]['key'] == $fix) $data_return .= ' checked';
					$data_return .= '> ' . $properties['data'][$i]['name'] . ' ' . "\n";
				}
				return $data_return;
			}
			else
			{
				for($i = 0; $i < count($properties['data']); $i++)
					if($properties['data'][$i]['key'] == $fix) 
						return '<input type="hidden" name="' . $var . '" value="' . $fix . '">' . "\n" . $properties['data'][$i]['name'];
			}
 

		case 'radio':
			if($right)
			{
				$data_return = '';
				for($i = 0; $i < count($properties['data']); $i++)
				{
					$data_return .= '<input name="' . $var . '" type="radio" value="' . $properties['data'][$i]['key'] . '"';
					if($properties['data'][$i]['key'] == $fix) $data_return .= ' checked';
					$data_return .= '> ' . $properties['data'][$i]['name'] . ' ' . "\n";
				}
				return $data_return;
			}
			else
			{
				for($i = 0; $i < count($properties['data']); $i++)
					if($properties['data'][$i]['key'] == $fix) 
						return '<input type="hidden" name="' . $var . '" value="' . $fix . '">' . "\n" . $properties['data'][$i]['name'];
			}
			break;

		case 'list':
			if($right)
			{
				$data_return = '';
				$_option = (isset($properties['option'])) ? $properties['option'] : '';
				$border_color = ($error) ? 'red' : $_color['dark'];

 					$data_return .= '<select name="' . $var . '" style="width : ' . $properties['width'] . 'px; height : 18px ; background-color: #FFFFFF; border-bottom: 1px solid; border-left: 1px solid; border-right: 1px solid; border-top: 1px solid; border-color: ' . $border_color . '; font-family: MS Sans Serif ; font-size: 10px; font-weight: normal"' . $_option . '>' . "\n";	
 
 					 	for($i = 0; $i < count($properties['data']); $i++)
						{
							$data_return .= '<option value="' . $properties['data'][$i]['key'] . '"';
							if($properties['data'][$i]['key'] == $fix) $data_return .= ' selected';
							$data_return .= '>' . $properties['data'][$i]['name'] . '</option>' . "\n";
						}
  
 				$data_return .= '</select>';
				return $data_return;
			}
			else
			{
				for($i = 0; $i < count($properties['data']); $i++)
					if($properties['data'][$i]['key'] == $fix) 
						return '<input type="hidden" name="' . $var . '" value="' . $fix . '">' . "\n" . $properties['data'][$i]['name'];
			}
			break;
	}
}
?>
