<?php
require_once 'includes/page_start.php';
?>
<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<title>Career Center</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<link rel="stylesheet" href="assets/css/mcccsmwa.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head> 
<body> 

<!-- MCCCS Information Page -->
<div data-role="page" data-content-theme="a" id="csmwa">
	
	<div data-role="header" id="header" data-position="fixed" data-tap-toggle="false" data-theme="a">
			<a href="index.php" data-icon="home" data-inline="true" data-iconpos="notext" class="ui-btn-right">home</a>
			<a href="#csmwa" data-icon="back" data-inline="true" data-iconpos="notext" class="ui-btn-left" data-rel="back">back</a>
			<img src="assets/images/mcc_career_services_small.png" width="203" height="59" alt="MCC Career Services">
	</div><!--header closing div-->
	
	<div data-role="content"><!-- opening content div-->
                <object type="text/html"  data="https://www.mccneb.edu/future/get_content.asp?url=/career_cluster/" style="width:100%;height:500px"></object>
	</div><!--closing content div-->
	
<?php
include ('includes/footer.php');
?>    
	<script type="text/javascript">
		$('a[rel="external"]').attr('target', '_self');
	</script>
</div><!-- closing page div -->
</body><!-- closing body div -->
</html><!-- closing html div -->