<?php  
// Traitement message flash et session user
if(isset($_SESSION['message'])) { 
  $class_alert = $_SESSION['type'];
  $message = $_SESSION['message']; 
  unset($_SESSION['message']);
  unset($_SESSION['type']);  
}
else {
  $message = null;
}

if(isset($_SESSION['user'])) { 
  $username = $_SESSION['user']['firstname'];
}
else {
  $username = null;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<meta name="viewport" content="initial-scale=1.0">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

</head>
<body>
	<div class="container">
		<header class="title-page">
      <?php if($message!=null) { ?>
        <div class="alert alert-<?php echo $class_alert ?>"> <?= $message ?></div>
        <?php } ?>
			<h1><?= $this->e($title) ?></h1>
		</header>
  
    <section>
      <?= $this->section('main_content') ?>
    </section>

    <section>
      <?= $this->section('bas-gauche') ?>
    </section>

    <section>      
        <?= $this->section('droite') ?>           
    </section>

	
    <footer>
		</footer>
	</div>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>  
    <script src="https://jqueryui.com/resources/demos/datepicker/i18n/datepicker-fr.js"></script>
	<?= $this->section('scripts') ?>
</body>
</html>