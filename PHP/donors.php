<!DOCTYPE html>
<html  >
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="generator" content="Mobirise v5.3.5, mobirise.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="Assets/images/drop-of-blood-96x96.png" type="image/x-icon">
	<meta name="description" content="">

	<title>Доноры</title>
	<link rel="stylesheet" href="assets/tether/tether.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="assets/dropdown/css/style.css">
	<link rel="stylesheet" href="assets/socicon/css/styles.css">
	<link rel="stylesheet" href="assets/theme/css/style.css">
	<link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
	<link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
	<?php
	include "dbconnect.php"; 
	$result = mysqli_query($db, "SELECT * FROM `donors`");
	
	if(isset($_POST['blood_type']) && isset($_POST['rh'])){
		$b_t = htmlentities($_POST['blood_type']);
		$rh = htmlentities($_POST['rh']);
		$result = mysqli_query($db, "SELECT * FROM `donors`
		WHERE `blood_type` = '$b_t' AND `rh` = '$rh'");
	}
	?>
	
</head>
<body>
  
  <?php include('top_menu.php'); ?>

<section class="features3 cid-svGN6RWd0N" id="features3-4">
<div class="vh-100">
    <div class="container-fluid">
        <div class="">
            <div class="title col-md-12 col-lg-11">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>Доноры</strong></h3>
            </div>
			<form action="donors.php" method="POST">
				<div class="col-md-12">
                    <div class="row">
						<div class="col-md-2 form-group">
							<select name="blood_type" class="form-control" >
								<option disabled selected>Группа крови</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
						<div class="col-md-2 form-group">
							<select name="rh" class="form-control" >
								<option disabled selected>Резус-фактор</option>
								<option value="+">+</option>
								<option value="-">-</option>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<button type="submit" class="btn item-btn btn-secondary display-7">Выбрать</button>
						</div>
					</div>
                </div>
			</form>
        </div>
		
		<div class="item features">
            <div class="item-wrapper" >
				<table border="2" cellpadding="5" align-center >
					<tr>
								<td><h5>Фамилия</h5></td>
								<td><h5>Имя</h5></td>
								<td><h5>Отчество</h5></td>
								<td><h5>Возраст</h5></td>
								<td><h5>Группа<br/>крови</h5></td>
								<td><h5>Резус-фактор</h5></td>
								<td><h5>Телефон</h5></td>
							</tr>
					<?php
						while ($donors = mysqli_fetch_assoc($result))
						{
							?>
							<tr>
								<td><?php echo $donors['middle_name']; ?></td>
								<td><?php echo $donors['first_name']; ?></td>
								<td><?php echo $donors['last_name']; ?></td>
								<td><?php echo $donors['age']; ?></td>
								<td><?php echo $donors['blood_type']; ?></td>
								<td><?php echo $donors['rh']; ?></td>
								<td><?php echo $donors['tel']; ?></td>
							</tr>
							<?php
						}
					?>
				</table>
            </div>
        </div>
    </div>
</div>
</section>

<?php include('footer.php'); ?>
  
</body>
</html>