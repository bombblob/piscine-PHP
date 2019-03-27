#! /usr/bin/php
<?php

function	ft_split($str) {
	return (explode(" ", preg_replace('/ +/', ' ', trim($str, " "))));
}

$weekdays = array(
	0 => "/^[Ll]undi$/",
	1 => "/^[Mm]ardi$/",
	2 => "/^[Mm]ercredi$/",
	3 => "/^[Jj]eudi$/",
	4 => "/^[Vv]endredi$/",
	5 => "/^[Ss]amedi$/",
	6 => "/^[Dd]imanche$/",
);

$days_english = array(
	0 => "Sun",
	1 => "Mon",
	2 => "Tue",
	3 => "Wed",
	4 => "Thurs",
	5 => "Fri",
	6 => "Sat",
);

$months = array(
	1 => "/^[Jj]anvier$/",
	2 => "/^[Ff][eé]vrier$/",
	3 => "/^[Mm]ars$/",
	4 => "/^[Aa]vril$/",
	5 => "/^[Mm]ai$/",
	6 => "/^[Jj]uin$/",
	7 => "/^[Jj]uillet$/",
	8 => "/^[Aa]out$/",
	9 => "/^[Ss]eptembre$/",
	10 => "/^[Oo]ctobre$/",
	11 => "/^[Nn]ovembre$/",
	12 => "/^[Dd][eé]cembre$/",
);

// TODO: error check argv[1]

$args = ft_split($argv[1]);
print_r($args);

$wday = 0;
while ($wday < count($weekdays) && !preg_match($weekdays[$wday], $args[0]))
	++$wday;

$day = $args[1];

$mon = 1;
while ($mon < count($months) && !preg_match($months[$mon], $args[2]))
	++$mon;

$year = $args[3];
$time = $args[4];

echo 'wday ', $wday, "\n";
echo 'day ', $day, "\n";
echo 'mon ', $mon, "\n";
echo 'year ', $year, "\n";
echo 'time ', $time, "\n";
$total = $year . "-" . $mon . "-" . $day . " " . $days_english[$wday] . " " . $time;
echo "$total\n";
$date = date_create_from_format('Y-m-d D H:i:s', $total);
echo $date->format('Y-m-d D H:i:s'), "\n";
echo $date->format('U'), "\n";
// TODO: error check datetime
?>