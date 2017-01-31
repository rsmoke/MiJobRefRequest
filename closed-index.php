<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../Support/configMiRefLetV2.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo "$siteTitle";?> Under Maintenance</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="LSA_Mi_Ref_Letter_Request">
  <meta name="keywords" content="LSA, Reference, Letter, UniversityofMichigan">
  <meta name="author" content="LSA-MIS_rsmoke">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <style>
    html {
      background: url(images/maintainImage.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='img/maintainImage.png', sizingMethod='scale');
      -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='img/maintainImage.png', sizingMethod='scale')";
    }
    body {
      margin: 0;
    }
    #contentwrapper {
      text-align: center;
    }
    #container {
      display: inline-block;
      overflow: hidden;
      min-width: 250px;
      min-height: 200px;
    }
    .header-center {
      color: black;
      font-weight: bold;
      text-align: center;
    }
    footer {
      position: fixed;
      bottom: 10px;
      width: 100%;
      min-width: 250px;
      overflow: hidden;
      text-align:center;
      background-color: #ddd;
      font-size: small;
    }
    .footeritem {
      width: calc(100% / 4);
      display: inline-block;
      vertical-align: top;
      text-align:center;
      padding:10px;
    }
    .clearfix {
      clear: both;
    }
    a {
      background-color: white;
    }
  </style>
</head>
<body>
<div id="contentwrapper">
  <div id="container">

    <h1 class="header-center">The <?php echo "$siteTitle";?> is currently not available.<br>Please
      check back.</h1>
  </div>
  <div class="clearfix"></div>
<?php include './php/footer.php' ?>

</div>
</body>
</html>
