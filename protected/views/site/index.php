<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php if (Yii::app()->user->isGuest){ ?>
<h1>Witaj na stronie <i>Przychodni Lekarskiej "Medicus"</i></h1>
<p>Zaloguj się aby uzyskać dostęp do danych.</p>

<?php } else  {
	$roles=Yii::app()->authManager->getRoles(Yii::app()->user->id);
    foreach ($roles as $role)
    	$role->name;
    if ($role->name =='lekarska') { 
?>
<h1>Witaj <?php echo Yii::app()->user->name ?> </h1>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Wizyta/lekarz"> Zaplanowane wizyty</a><br>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Wizyta/historia"> Historia Wizyt</a><br> 
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pracownik/update/<?php echo Yii::app()->user->id ?>">Edytuj swój profil</a>

<?php }
	if ($role->name =='recepcja') {
 ?>
 <h1>Witaj <?php echo Yii::app()->user->name ?> </h1>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Wizyta/admin">Zaplanowane wizyty</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Wizyta/recepcja_historia"> Historia wizyt</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pacjent/admin">Dane pacjentów</a><br> 
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pacjent/create">Dodaj pacjenta</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Wizyta/create">Zaplanuj wizytę</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pracownik/update/<?php echo Yii::app()->user->id ?>">Edytuj swój profil</a>
 
 <?php }
 	if ($role->name =='pielegniarka') {
 ?>
 <h1>Witaj <?php echo Yii::app()->user->name ?> </h1>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pacjent/pielegniarka">Dane pacjentów</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Wizyta/pielegniarka_zaplanowane">Zaplanowane wizyty</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Wizyta/pielegniarka"> Historia wizyt</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pracownik/update/<?php echo Yii::app()->user->id ?>">Edytuj swój profil</a>

 <?php }
 	if ($role->name =='admin') {
 ?>
 <h1>Witaj <?php echo Yii::app()->user->name ?> </h1>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pracownik/admin">Dane pracowników</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pracownik/create">Dodaj pracownika</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/auth">Przypisz role pracownikom</a><br>
 <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Pracownik/update/<?php echo Yii::app()->user->id ?>">Edytuj swój profil</a>

 <?php } } ?>






