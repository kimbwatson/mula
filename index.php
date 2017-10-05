<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Newsletter</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="simplegrid.css">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>

<body>


<div class="grid grid-pad">
    <div class="col-1-2">
       <div class="content">
           <img src="logo.png">
           <h1 class="tekst1">Lorem ipsum dolor sit amet tetur piscing elit Mauris condimentum tellus quis tellus eleifend</h1>
           <h2 class="tekst2">Nullam ut ante quam. Aenean tortor massa, maximus in quam at, pretium dapibus augue. Nunc porta arcu a turpis imperdiet suscipit. Phasellus ac libero ac magna iaculis faucibus. </h2>
           <h3 class="tekst3">Cras in justo sed felis posuere varius eget eget diam. Proin ex tortor, condimentum commodo porttitor semper, feugiat nec lorem. Donec non viverra sem, non tristique odio. Mauris eu lacus justo. Sed vehicula purus sed elit facilisis imperdiet. Nullam leo ipsum, vulputate a rutrum eu, vestibulum nec urna. Donec a arcu non arcu lobortis rhoncus at a lacus. Maecenas tristique lectus in massa.</h3>
           
        <div data-role="main" class="ui-content">
    <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all ui-icon-check ui-btn-icon-left">Tilmeld</a>

    <div data-role="popup" id="myPopup" class="ui-content" style="min-width:230px;">
  <?php
	
	$cmd   = filter_input(INPUT_POST, 'cmd');
	$name  = filter_input(INPUT_POST, 'name');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
	$per = filter_input(INPUT_POST, 'permission');
	
	if(empty($cmd)){
		?>
		<div="container">
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<div id="newsletter"><fieldset>
		<legend>Nyhedsbrev</legend>
		<input class="tekst2" type="text" name="name" placeholder="Navn"><br>
		<input class="tekst2" type="email" name="email" placeholder="E-mail"><br>
		<input class="tekst2" type="phone" name="phone" placeholder="Telefon"><br>
		<input class="tekst2" type="checkbox" name="permission">Permission<br>
		<input class="tekst2" type="submit" name="cmd" value="Tilmeld">
		<input class="tekst2" type="submit" name="cmd" value="Afmeld">
	</fieldset>
</form>		
	</div>
	
		<?php
	}
	else {
		if($cmd == 'Tilmeld') {
			require_once('db_con.php');
			$sql = 'INSERT INTO newsletter (email, name, phone, permission) VALUES (?, ?, ?, ?)';
			$stmt = $con->prepare($sql);
			$stmt->bind_param('ssii', $email, $name, $phone, $per);
			$stmt->execute();
			
			if ($stmt->affected_rows > 0){
				echo '<div="containertak">Du er nu tilføjet til listen</div>';
			}
			else {
				echo $email.' var allerede på listen';
			}
		}
		if($cmd == 'Afmeld') {
			require_once('db_con.php');
			$sql = 'DELETE FROM newsletter WHERE email=?';
			$stmt = $con->prepare($sql);
			$stmt->bind_param('s', $email);
			$stmt->execute();
			
			if ($stmt->affected_rows > 0){
				echo 'Du er nu fjernet fra SPAM-listen :-((';
			}
			else {
				echo $email.' var ikke på listen?!?!';
			}
		}
		echo '<hr><a href="newsletter.php"> Tilbage</a>';
	}
	
?></span>
			</div>

       </div>
   </div></div>
    <div class="col-1-2">
       <div class="content">
           <img src="design.png">
       </div>
    </div>
    
	
	<hr>
	<div class="border"></div></div>
	
	
	<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
</body>
</html>

