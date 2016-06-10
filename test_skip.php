<?php
require_once 'includes/pdo.php';
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>MCCCS Careers & Majors</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.min.css">
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
	<script src="assets/scripts/html5shiv-3.7.0.min.js"></script>
	<!-- <script src="assets/scripts/default.js"></script> -->	
	<!-- <script src="assets/scripts/careers_majors.js"></script> -->		
</head>
 
<body> 

<!-- Careers & Majors Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->

	<div data-role="content"><!-- opening content div-->

	<?php
	require_once 'includes/functions.php';	
	$types = array();
	$types[0] = 'r';	
	$types[1] = 'a';	
	$types[2] = 'c';	
	?>

	<h3>Testing</h3>	

	<?php for ($i = 0; $i < 3; $i += 1) { ?>	
	<div data-role="collapsible">	
	
	<h2><?php echo personalityType($types[$i]); ?></h2>
	
	<h3><?php echo personalityType($types[$i]); ?> Personalities Match With These Careers</h3>
	
	<div class="data">	
	
	<?php
	$query = 'SELECT career_name FROM careers WHERE holl_catg = :holl_catg ' .
		'ORDER BY seq_num';
		
	try {		
	  $statement = $pdo->query($query);
    }
    catch(PDOException $e)
    {
	  writeLogMessage($pdo,999, $e->getMessage());	
	  header("Location: http://infolnx7.mccinfo.net/~repaschall/mcccsmwa/error_apology_no_db_log.php");
	  exit;	
    }
	
	$statement->bindParam(':holl_catg', $types[$i], PDO::PARAM_STR);
	$statement->execute();
	
	while ($row = $statement->fetch()) {
	?>
	     <div class="datum"><?php echo $row['career_name']; ?></div>
	<?php } ?> 
	
	</div> <!--class="data"-->
	
    </div> <!--id="accordion"-->

		<?php } ?> 
		
			<div>
				<!--<h3>Ready For Your Future?</h3>-->
				<a class="button" href="next_steps.php" data-role="button" data-inline="true" >Next steps</a>
			</div>

</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?> 	
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->