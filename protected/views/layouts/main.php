<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dashboard.css">
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.4.min.js"></script>


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>">Przychodnia Lekarska "Medicus"</a>
        </div>
       
            <ul class="nav navbar-nav navbar-right">
                <?php 
                $roles=Yii::app()->authManager->getRoles(Yii::app()->user->id);
    foreach ($roles as $role){
        $role->name;}

                $this->widget('zii.widgets.CMenu', array(
                    'htmlOptions'=>array("class"=>"nav nav-pills"),
                    'items'=>array(
                        array('label'=>'Zaloguj się', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Zaplanowane wizyty', 'url'=>array('/Wizyta/lekarz'), 'visible'=>$role->name =='lekarska'),
                        array('label'=>'Historia wizyt', 'url'=>array('/Wizyta/historia'), 'visible'=>$role->name =='lekarska'),
                        array('label'=>'Zaplanowane wizyty', 'url'=>array('/Wizyta/admin'), 'visible'=>!Yii::app()->user->isGuest  && $role->name =='recepcja'),
                        array('label'=>'Historia wizyt', 'url'=>array('/Wizyta/recepcja_historia'), 'visible'=>!Yii::app()->user->isGuest  && $role->name =='recepcja'),
                        array('label'=>'Dane pacjentów', 'url'=>array('/Pacjent/admin'), 'visible'=>!Yii::app()->user->isGuest  && $role->name =='recepcja'),
                        array('label'=>'Dodaj pacjenta', 'url'=>array('/Pacjent/create'), 'visible'=> !Yii::app()->user->isGuest  && $role->name =='recepcja'),
                        array('label'=>'Zaplanuj wizytę', 'url'=>array('/Wizyta/create'), 'visible'=>!Yii::app()->user->isGuest  && $role->name =='recepcja'),
                        array('label'=>'Dane pacjentów', 'url'=>array('/Pacjent/pielegniarka'), 'visible'=>$role->name =='pielegniarka'),
                        array('label'=>'Zaplanowane wizyty', 'url'=>array('/Wizyta/pielegniarka_zaplanowane'), 'visible'=>$role->name =='pielegniarka'),
                        array('label'=>'Historia wizyt', 'url'=>array('/Wizyta/pielegniarka'), 'visible'=>$role->name =='pielegniarka'),
                        array('label'=>'Dane pracowników', 'url'=>array('/Pracownik/admin'), 'visible'=>$role->name =='admin'),
                        array('label'=>'Dodaj pracownika', 'url'=>array('/Pracownik/create'), 'visible'=>$role->name =='admin'),
                        array('label'=>'Przypisz rolę pracownikom', 'url'=>array('/auth'), 'visible'=>$role->name =='admin'),
                        array('label'=>'Edytuj swój profil', 'url'=>array('Pracownik/update/'.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Wyloguj się ('.Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    )
                ))?>
            </ul>
        </div>
    </div>
</nav>

            

	

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Michal Jackowiak.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
