<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../Support/configMiRefLetV2.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../Support/basicLib.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
    <title><?php echo "$deptShtName";?> Ref Letter Request - UM Department of <?php echo "$deptLngName";?></title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="css/default.css" type="text/css" />
    <link rel="stylesheet" href="css/jobRef.css" type="text/css" />
</head>
<body>
<?php echo $login_name ?>

<div id="Container">

    <div id="MainContent">
        <div id="Banner"><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><img src="images/banner<?php echo "$deptShtName";?>.png" alt="<?php echo "$deptLngName";?> Home page" /></a></div><!-- #Banner -->
        <div id="leftCol" class="column">
            <div id="instructions">
                <h1><?php echo "$deptLngName";?> Reference Letter Requests</h1>
                <p>The Department of <?php echo "$deptLngName";?> provides the service of sending Student Reference Letters for job applicants. If you would like the Graduate office
                 to send a letter for you, please use the button below to request this service. You will want to be sure that the faculty writers of your
                 letters are registered by looking at the listing in the beige box.
                 You are able to view past submitted requests by clicking the ID number next to the letter description in the table.
                </p>
            </div><!-- #instructions -->
            <div id="loginHeader">
                You are logged in as: <span class="loginUser"><?php echo($login_name) ?></span>  <br />(if you are not <?php echo($login_name) ?> please <a href="https://weblogin.umich.edu/cgi-bin/logout">log out</a> and log in again)
            </div> <!-- loginHeader -->
            <div>
                <div id="writerBox">
                    <h5>These are your letter writers.</h5>
                    <div id="writers"></div>
                    <br />
                </div><!-- #writerBox -->
                <form id="myForm">
          If you would like to register another letter writer please enter their <strong>uniqname</strong> here
                    <input type="text" name="name" />
          <button id="newWriter" type="button" class="btn btn-info btn-xs">Add</button>
          <br/><em>--look up uniqnames using the <a href="https://mcommunity.umich.edu/" target="_blank">Mcommunity
              directory</a>.</em>
                </form><!-- myForm -->
            </div><!-- form section-->
            <hr />
            <div>
                <p>These are your submitted requests.</p>
                <button id="reqSub" type="button" class="btn btn-info btn-xs">Add a New Request</button>&nbsp;&nbsp;<button id="indDwnld" class="btn btn-default btn-xs" type="button">Download Archive</button><br />
                <div id="reqSubmitted">
          <?php include 'php/userSubmitted.php'; ?>
                </div> <!-- #reqSubmitted -->
            </div><!-- submitted requests section -->
        </div><!-- #leftCol -->
        <div id="rightColUser">
            <h1 class="rtCol">QUICK LINKS</h1>
            <ul>
            <li><a href="http://www.lsa.umich.edu/<?php echo strtolower("$deptShtName");?>"><?php echo "$deptLngName";?> Department</a></li>
            <li><a href="http://www.umich.edu">UoM Portal</a></li>
            <?php 
                if ($userAdmin){
                echo "<li><a href='./ADMIN'>ADMIN</a></li>";
                }
            ?>
            </ul>
            </div> <!-- #rightCol -->
        </div> <!-- #MainContent -->
<?php include './php/footer.php' ?>

</div> <!-- #Container -->

    <script src="js/my_script.js" type="text/javascript"></script>
</body>
</html>

<?php
