<?php
class load_module{
	function add($file){
		$this -> load_array[] = $file;
	}
	function output()	{
		// ===== Goval Dump
		while(list($var, $value) = each($GLOBALS))
			$$var = $value;
		
		for($cx = 0; $cx < count($this -> load_array); $cx++)	{
			box_header($this -> load_array[$cx]['name'], $this -> load_array[$cx]['header']); //���¡������ ./theme/Test/frame.php
			// $cx = 1 �ӡ�� add ���� ����á���˹�� Login ./element/user.php
			// $cx = 2 �ӡ�� add ���� ����á���˹�� Login ./element/menu.php
			// $cx = 3 �ӡ�� add ���� ����á���˹�� Login ./element/News.php
				include('./element/' . $this -> load_array[$cx]['file'] . '.php'); 
				box_footer($this -> load_array[$cx]['name'], $this -> load_array[$cx]['header']); // ���¡������ ./theme/Test/frame.php
		}
	}
}
?>
