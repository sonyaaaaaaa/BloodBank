<?php include "dbconnect.php"; ?>

<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v5.3.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="Assets/images/drop-of-blood-96x96.png" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>Добавить донора</title>
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
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Заполните форму для донора</strong></h3>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="addDonor.php" method="POST" class="mbr-form form-with-styler mx-auto" >
                    <div class="dragArea row">
                        <div class="col-md-12 form-group">
                            <input type="text" name="firstname" placeholder="Имя" class="form-control">
                        </div>
						<div class="col-md-12 form-group">
                            <input type="text" name="middlename" placeholder="Фамилия" class="form-control">
                        </div>
						<div class="col-md-12 form-group">
                            <input type="text" name="lastname" placeholder="Отчество" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" name="age" placeholder="Возраст" class="form-control">
                        </div>
						<div class="col-md-12">
                            <div class="row">
								<div class="col-md-6 form-group">
									<select name="blood_type" class="form-control" >
										<option disabled selected>Группа крови</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
								<div class="col-md-6 form-group">
									<select name="rh" class="form-control" >
										<option disabled selected>Резус-фактор</option>
										<option value="+">+</option>
										<option value="-">-</option>
									</select>
								</div>
							</div>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="tel" name="phone" placeholder="89999999999" pattern="8[0-9]{10}" maxlength="11" class="form-control">
                        </div>
						<div class="col-md-12">
                            <button type="submit" class="btn item-btn btn-secondary display-7">Добавить</button>
                        </div>
						<div class="col-md-12">
                            <?php
							//проверяем, пришли данные или нет
							if(isset($_POST['firstname']) && isset($_POST['middlename']) && 
								isset($_POST['lastname']) && isset($_POST['age']) && isset($_POST['blood_type']) && 
								isset($_POST['rh']) && isset($_POST['phone'])) 
							{
							//из данных собираем соответствующие переменные
								$fname = htmlentities($_POST['firstname']);
								$mname = htmlentities($_POST['middlename']);
								$lname = htmlentities($_POST['lastname']);
								$age = htmlentities($_POST['age']);
								$btype = $_POST['blood_type'];
								$rh = $_POST['rh'];
								$tel = htmlentities($_POST['phone']);
								mysqli_query($db, "INSERT INTO `donors`(`middle_name`, `first_name`, `last_name`, `age`, `blood_type`, `rh`, `tel`)
								VALUES('$fname', '$mname', '$lname', '$age', '$btype', '$rh', '$tel')");
							}
							?>
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