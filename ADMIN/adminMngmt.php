<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../Support/configMiRefLetV2.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../Support/basicLib.php';

$sql = "SELECT * FROM SRL_tbl_Admin WHERE AdminUniqname = '$login_name'";
if (!$check = $db->query($sql)) {
  db_fatal_error('data select issue', $db->error, $sql);
  exit($user_err_message);
}

$numrows = $check->num_rows;
if ($numrows){

	if(isset($_POST['delete'])) {
	if ((int)$_POST['delete'] != 1 ){
    $delquery = 'DELETE FROM SRL_tbl_Admin WHERE id = ' . (int)$_POST['delete'];
    if (!$result = $db->query($delquery)) {
      db_fatal_error('data delete issue', $db->error, $delquery);
      exit($user_err_message);
    }
      unset($_POST['delete']);
  }
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<title><?php echo "$deptShtName";?> Ref Letter ADMIN</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


  <link rel="stylesheet" href="../css/default.css" type="text/css"/>
  <link rel="stylesheet" href="../css/jobRef.css" type="text/css"/>
</head>

<body>
<div id="Container">
	<div id="MainContent">
	<div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="../images/banner.png" alt="<?php echo "$deptLngName";?> Home page" /></a></div>
	<div id="leftCol">
		<div id="instructions">
			<h1><?php echo "$deptLngName";?> Reference Letter Request Admin Management interface</h1>
			<p>These are the current individuals who are permitted to manage the <?php echo "$deptLngName";?> Reference Letter Requests Application</p> 
		</div><!-- #instructions -->

		<div id="adminList">
			<span id="currAdmins">
	
		<?php
		$queryRecord = 'SELECT * FROM SRL_tbl_Admin ORDER BY AdminUniqname ASC';
		if (!$result = $db->query($queryRecord)) {
			db_fatal_error('data select issue', $db->error, $queryRecord);
			exit($user_err_message);
		}

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
			$fullname = ldapGleaner($row['AdminUniqname']);
			echo '<div class="record" id="record-',$row['id'],'">
				<a href="?delete=',$row['id'],'" class="delete"><span style=color:red;font-weight:bold;>X</span></a>
				<strong>',$row['AdminUniqname'],'</strong>	-- ', $fullname[0], "&nbsp;", $fullname[1],
			'</div>';
		}
		?>
			</span>
		</div><!-- testing delete -->
		<br />
		<div id="myAdminForm"><!-- add Admin -->
			If you would like to register another Administrator please enter their <b>uniqname</b> here
			<input type="text" name="name" />
			<button id="adminSub">Add Administrator</button><br /><i>--look up uniqnames using the <a href="https://mcommunity.umich.edu/" target="_blank">Mcommunity directory</a>.</i>	   	

		</div><!-- add Admin -->
<!--
		<div>
		<span id="currAdmins"></span>
		</div>	
-->
	</div><!-- #leftCol -->
	<div id="rightCol">
		<h1 class="rtCol">QUICK LINKS</h1>
		<ul>
		<li><a href="index.php">All Letters Management</a></li>
		<li><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><?php echo "$deptLngName";?> Department</a></li>
		</ul>
	</div> <!-- #rightCol -->
	</div> <!-- #MainContent -->
<?php include '../php/footer.php' ?>
</div> <!-- #Container -->
	<script src="js/my_adminScript.js" type="text/javascript"></script>
</body> 
</html>
<?php

} else { 
	
?>
<!doctype html>
<html>
<head>
  <title>YOU ARE NOT AUTHORIZED - UM Department of <?php echo "$deptLngName"; ?></title>
  <link rel="stylesheet" href="../css/default.css" type="text/css"/>
  <link rel="stylesheet" href="../css/jobRef.css" type="text/css"/>
</head>
<body>
<div id="Container">
	<div id="MainContent">
		<div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="../images/banner.png" alt="<?php echo "$deptLngName";?> Home page" /></a></div>
		<div id="leftCol">
			<div id="instructions" style="color:sienna;">
				<h1>You are not authorized to this space!!!</h1>
				<h3>University of Michigan - LSA Computer System Usage Policy</h3>
				<p>This is the University of Michigan information technology environment. You 
				MUST be authorized to use these resources. As an authorized user, by your use 
				of these resources, you have implicitly agreed to abide by the highest 
				standards of responsibility to your colleagues, -- the students, faculty, 
				staff, and external users who share this environment. You are required to 
				comply with ALL University policies, state, and federal laws concerning 
				appropriate use of information technology. Non-compliance is considered a 
				serious breach of community standards and may result in disciplinary and/or 
				legal action.</p>
			</div><!-- #instructions -->
		</div><!-- #leftCol -->
		<div id="rightCol">
			<h1 class="rtCol">QUICK LINKS</h1>
			<ul>
			<li><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><?php echo "$deptLngName";?> Department</a></li>
			<li><a href="http://www.lsa.umich.edu/">College of LSA</a></li>
			</ul>
		</div> <!-- #rightCol -->
	</div> <!-- #MainContent -->
<?php include '../php/footer.php' ?>
</div> <!-- #Container -->
</body> 
</html>	
<?php
}

$db->close();
