<?php 
include "dbconnect.php";
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
  
  
  <title>Добавить донацию</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>
  
<?php include('top_menu.php'); ?>

<section class="form7 cid-svH5fHAUj1" id="form7-8">
<div class="vh-100">
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Выберите пациента для переливания</strong></h3>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="addTransfusion.php" method="POST" class="mbr-form form-with-styler mx-auto" >
                    <div class="dragArea row">
                        <div class="col-md-12 form-group">
							<?php
							$result = mysqli_query($db, 'SELECT `id_p`,`middle_name`, `first_name`, `last_name` FROM `patient`')
							?>
							<select id="patients" name="id_p" class="form-control" onchange="addPatient()">
								<option disabled selected>Выберите пациента</option>
								<?php while( $row = mysqli_fetch_assoc($result) ){
									?><option value="<?php echo($row['id_p']) ?>"><?php echo $row['middle_name']," ",$row['first_name']," ",$row['last_name'];?></option><?php
								}
								?>
								<option value="addPatient.php">Добавить нового</option>
							</select>
							<script>
								function addPatient() {
									var z = document.getElementById("patients").value;
									if (!isFinite(z)){
										document.location.href=z;
									}
								}
							</script>
                        </div>
						<div class="col-md-12">
                            <button type="submit" class="btn item-btn btn-secondary display-7">Добавить</button>
                        </div>
						<div class="col-md-12">
							<?php
							if(isset($_POST['id_p'])) 
							{
							//из данных собираем соответствующие переменные
								$id_p = htmlentities($_POST['id_p']);
								mysqli_query($db, "INSERT INTO `transfusion`(`id_p`)
								VALUES('$id_p')");
								$id_tr = mysqli_insert_id($db);
								$blood = mysqli_fetch_assoc(mysqli_query($db, "SELECT `blood_type`,`rh` FROM `patient` WHERE `id_p` = $id_p "));
								$b_t = $blood['blood_type'];
								$rh = $blood['rh'];
								if($rh == '-'){
									if(($b_t%2) == 1){
										$donation = mysqli_fetch_assoc(mysqli_query($db, "SELECT `blood_bank`.`id_donation` AS `id_don`
												FROM `donors` join `donations` ON `donors`.`id_d` = `donations`.`id_d`
													join `blood_bank` ON `donations`.`id_donation` = `blood_bank`.`id_donation` 
												WHERE (`blood_type` = 3 OR `blood_type` = 1) AND `blood_type` <= '$b_t' AND `rh` = '-'
												ORDER BY `date` LIMIT 1"));
									}
									else{
										$donation = mysqli_fetch_assoc(mysqli_query($db, "SELECT `blood_bank`.`id_donation` AS `id_don`
												FROM `donors` join `donations` ON `donors`.`id_d` = `donations`.`id_d`
													join `blood_bank` ON `donations`.`id_donation` = `blood_bank`.`id_donation` 
												WHERE `blood_type` <= '$b_t' AND `rh` = '-'
												ORDER BY `date` LIMIT 1"));
									}
								}
								else{
									if(($b_t%2) == 1){
										$donation = mysqli_fetch_assoc(mysqli_query($db, "SELECT `blood_bank`.`id_donation` AS `id_don`
												FROM `donors` join `donations` ON `donors`.`id_d` = `donations`.`id_d`
													join `blood_bank` ON `donations`.`id_donation` = `blood_bank`.`id_donation` 
												WHERE (`blood_type` = 3 OR `blood_type` = 1) AND `blood_type` <= '$b_t'
												ORDER BY `date` LIMIT 1"));
									}
									else{
										$donation = mysqli_fetch_assoc(mysqli_query($db, "SELECT `blood_bank`.`id_donation` AS `id_don`
												FROM `donors` join `donations` ON `donors`.`id_d` = `donations`.`id_d`
													join `blood_bank` ON `donations`.`id_donation` = `blood_bank`.`id_donation` 
												WHERE `blood_type` <= '$b_t'
												ORDER BY `date` LIMIT 1"));
									}
								}
								$id_don = $donation['id_don'];
								mysqli_query($db, "DELETE FROM `blood_bank` WHERE `blood_bank`.`id_donation` = '$id_don'");
							}?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>




<?php include('footer.php'); ?>
 
  
</body>
</html>