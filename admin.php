<!DOCTYPE html>
<html  >
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="generator" content="Mobirise v5.3.5, mobirise.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="shortcut icon" href="Assets/images/drop-of-blood-96x96.png" type="image/x-icon">
	<meta name="description" content="">
	 
	  
	<title>Admin</title>
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
	<?php include "dbconnect.php"; ?>  
</head>
<body>
	<?php include('top_menu.php'); ?>

<section class="features3 cid-svGN6RWd0N" id="features3-4">
    
<div class="vh-100">
    <div class="container">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Разделы</strong></h4>
            
        </div>
        <div class="row mt-4">
            
            <div class="item features-image сol-12 col-md-6 col-lg-4 active">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/donor-696x415.png" alt="" data-slide-to="0">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>Доноры</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><a class="nav-link link text-black text-primary display-4" href="addDonor.php">Добавить донора</a></h6>
                        
                    </div>
                    <div class="mbr-section-btn item-footer mt-2"><a href="donors.php" class="btn item-btn btn-secondary display-7">Список доноров</a></div>
                </div>
            </div>
			<div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/patients-3-437x247.png" alt="" data-slide-to="1">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>Пациенты</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><a class="nav-link link text-black text-primary display-4" href="addPatient.php">Добавить пациента</a></h6>
                        
                    </div>
                    <div class="mbr-section-btn item-footer mt-2"><a href="patients.php" class="btn item-btn btn-secondary display-7">Список пациентов</a></div>
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/bank-1-696x400.png" alt="">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-7"><strong>Банк крови</strong></h5>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><a class="nav-link link text-black text-primary display-4" href="addDonation.php">Добавить донацию</a></h6>
                        <h6 class="item-subtitle mbr-fonts-style mt-1 display-7"><a class="nav-link link text-black text-primary display-4" href="addTransfusion.php">Добавить переливание</a></h6>
                        
                    </div>
                    <div class="mbr-section-btn item-footer mt-2"><a href="bank.php" class="btn item-btn btn-secondary display-7">Просмотреть содержимое</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php include('footer.php'); ?>

</body>
</html>