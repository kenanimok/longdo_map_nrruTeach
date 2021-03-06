<?php
Function unno_th_raws($_date, $short = false)
{
	if(strlen($_date) != 8)
		return '';
	$_day = 0 + substr($_date, 6, 2);
	$_month = 0 + substr($_date, 4, 2);
	$_year = 0 + substr($_date, 0, 4);

	if($_year < 2050)
		$_year += 543;

	$month_name = ($short) 
		? 	$month_name = array('???Ҥ?', '????Ҿѹ??', '?չҤ?', '????¹', '????Ҥ?', '?Զع?¹', '?á?Ҥ?', '?ԧ?Ҥ?', '?ѹ??¹', '???Ҥ?', '??Ȩԡ?¹', '?ѹ?Ҥ?')
		: array('???Ҥ?', '????Ҿѹ??', '?չҤ?', '????¹', '????Ҥ?', '?Զع?¹', '?á?Ҥ?', '?ԧ?Ҥ?', '?ѹ??¹', '???Ҥ?', '??Ȩԡ?¹', '?ѹ?Ҥ?');
	return $_day . ' ' . $month_name[($_month - 1)] . ' ' . (($short) ? substr($_year, 0, 4) : $_year);
}


Function unno_sql_datetimes($sql_date, $_time = true)
{
	$dts = explode(' ', $sql_date);

	if($_time && count($dts) != 2)
		return $sql_date;

	$date = implode('', explode('-', $dts[0]));
	if($date + 0 == 0)
		return '-';
	return unno_th_raws($date, true) . ($_time ? ' + ' . $dts[1] : '');
}

Function unno_th_raws1($_date, $short = false)
{
	if(strlen($_date) != 8)
		return '';
	$_day = 0 + substr($_date, 6, 2);
	$_month = 0 + substr($_date, 4, 2);
	$_year = 0 + substr($_date, 0, 4);

	if($_year < 2050)
		$_year += 543;

	$month_name = ($short) 
		? 	$month_name = array('?.?.', '?.?.', '??.?.', '??.?.', '?.?.', '??.?.', '?.?.', '?.?.', '?.?.', '?.?.', '?.?.', '?.?.')
		: array('?.?.', '?.?.', '??.?.', '??.?.', '?.?.', '??.?.', '?.?.', '?.?.', '?.?.', '?.?.', '?.?.', '?.?.');
	return $_day . ' ' . $month_name[($_month - 1)] . ' ' . (($short) ? substr($_year, 0, 4) : $_year);
}


Function unno_sql_datetime($sql_date, $_time = true)
{
	$dts = explode(' ', $sql_date);

	if($_time && count($dts) != 2)
		return $sql_date;

	$date = implode('', explode('-', $dts[0]));
	if($date + 0 == 0)
		return '-';
	return unno_th_raws1($date, true) . ($_time ? ' + ' . $dts[1] : '');
}
?>
