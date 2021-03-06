<?php 
function convert($date){
	$convdate = date("d.m.Y", strtotime($date));
	return $convdate;
}
?>

<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.3.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="Assets/images/drop-of-blood-96x96.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Банк крови</title>
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
  $key = false;
  $result = mysqli_query($db, "SELECT `id_b`,`blood_type`,`rh`,`date`,`amount`
	FROM `donors` join `donations` ON `donors`.`id_d` = `donations`.`id_d`
	join `blood_bank` ON `donations`.`id_donation` = `blood_bank`.`id_donation` ORDER BY `date`");
	
  if(isset($_POST['blood_type']) && isset($_POST['rh'])){
	  $key = true;
	  $b_t = htmlentities($_POST['blood_type']);
	  $rh = htmlentities($_POST['rh']);
	  $result = mysqli_query($db, "SELECT `id_b`,`blood_type`,`rh`,`date`,`amount`
	FROM `donors` join `donations` ON `donors`.`id_d` = `donations`.`id_d`
	join `blood_bank` ON `donations`.`id_donation` = `blood_bank`.`id_donation` 
	WHERE `blood_type` = '$b_t' AND `rh` = '$rh'
	ORDER BY `date`");
	}
  $date1 = date('Y-m-d', time());
  ?>  
  
  
  
</head>
<body>
  
  <?php include('top_menu.php'); ?>

<section class="features3 cid-svGN6RWd0N" id="features3-4" >
    
<div class="vh-100">
    <div class="container-fluid" >
        <div class="">
            <div class="title col-md-12 col-lg-12">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2"><strong>Банк крови</strong></h3>
            </div>
			<form action="bank.php" method="POST">
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
						<td><h5>Группа<br/>крови</h5></td>
						<td><h5>Резус-фактор</h5></td>
						<td><h5>Дата</h5></td>
						<td><h5>Объем</h5></td>
					</tr>
				<?php
					while ($donations = mysqli_fetch_assoc($result))
					{
						$amount += $donations['amount'];
						$date2 = date('Y-m-d', strtotime($donations['date']));
						$datetime1 = new DateTime($date1);
						$datetime2 = new DateTime($date2);
						$interval = $datetime1->diff($datetime2);
						$raz = $interval->format('%a');
						if($raz < 21)
							{?>
								<tr>
									<td><?php echo $donations['blood_type']; ?></td>
									<td><?php echo $donations['rh']; ?></td>
									<td><?php echo convert($donations['date']); ?></td>
									<td><?php echo $donations['amount']; ?></td>
								</tr>
							<?php
							}
						else{
							$id_b = $donations['id_b'];
							mysqli_query($db, "DELETE FROM `blood_bank` WHERE `blood_bank`.`id_b` = '$id_b'");
						}
					}?>
				</table>
			</div>
		</div>
		<div><?php
			if($key){?>
				<div class="title col-md-12 col-lg-12">
					<h5 class="mbr-section-title mbr-fonts-style align-center mb-4 display-5">
						<strong><?php echo "Всего: $amount литров $b_t$rh крови";?></strong>
					</h5>
				</div><?php
			}?>
		</div>
	</div>
</div>
</section>
<?php include('footer.php'); ?>
  
</body>
</html>