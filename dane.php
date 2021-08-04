<?php
$datte = $_POST['tm'];
function dni_mies($mies,$rok) {
	$dni = 31;
	while (!checkdate($mies, $dni, $rok)) $dni--;
	return $dni;
}


function dzien_tyg_nr($mies,$rok) {
	$dzien = date("w", mktime(0,0,0,$mies,1,$rok));
	return $dzien;
}

function dzien_tyg($nr) {
	$dzien = array(0 => "Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota");
	return $dzien[$nr];
}


function miesiac_pl($mies) {
	$mies_pl = array(1=>"Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień");
	return $mies_pl[$mies];
}

?><div id="kalendarz">
<?php
echo '<p>'.miesiac_pl(date("n", $datte)).' '.date("Y", $datte).'</p>';
?>
<ul>
 <li>Nd</li>
 <li>Pn</li>
 <li>Wt</li>
 <li>Śr</li>
 <li>Cz</li>
 <li>Pt</li>
 <li>Sb</li>
</ul>

<ul>
<?php
for($i=0;$i<dzien_tyg_nr(date("n", $datte),date("Y", $datte));$i++)
 echo '<li class="hidden">00</li> ';

for($i=1;$i<dni_mies(date("n", $datte),date("Y", $datte)) +1;$i++) {
	if ($i<10) $i = '0'.$i;
	echo '<li><a href=#>'.$i.'</a></li> ';
}
?>
</ul>
<div>