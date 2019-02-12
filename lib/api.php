<?php
session_start();
if (!isset($_SESSION['json_history'])) {
  $_SESSION['json_history'] = "";
}
include '../config.php';
include 'mysql.php';
include 'utils.php';

if (!isset($_POST['shorturl'])) {
  echo "Введите url ";
  exit();
}

if (filter_var($_POST['shorturl'], FILTER_VALIDATE_URL) === false) {
    echo("Введите правельный url");
    exit();
}

if ($_POST['customurl'] == "") {
  $custom = generateRandomString();
  $iscustom = 0;
} else {
  if (!$specialchars) {
    if (preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $_POST['customurl']))
    {
      echo "";
      exit();
    }
  }
  $custom = mysqli_real_escape_string($dbcon, $_POST['customurl']);
  $custom = str_replace(" ", "-", $custom);
  $iscustom = 1;
}
$url = $_POST['shorturl'];
$url = mysqli_real_escape_string($dbcon, $url);
if ($iscustom == 1) {
  $verify = "SELECT * FROM `shorturls` WHERE `ShortUrl` = '$custom'";
  $run = mysqli_query($dbcon, $verify);
  if (mysqli_num_rows($run) >= 1) {
    echo "Этот url существует";
    exit();
  } else {
    $insert = "INSERT INTO `shorturls` (`URL`, `ShortUrl`, `IsCustom`, `views`) VALUES ('$url', '$custom', $iscustom, 0)";
    mysqli_query($dbcon, $insert);
    echo "true " . $weburl . $custom;
  }
} else {
  $verify = "SELECT * FROM `shorturls` WHERE `URL` = '$url' AND `IsCustom` = 0";
  $run = mysqli_query($dbcon, $verify);
  if (mysqli_num_rows($run) >= 1) {
    $row = mysqli_fetch_array($run);
    echo "true " . $weburl . $row['ShortUrl'];
  } else {
    $insert = "INSERT INTO `shorturls` (`URL`, `ShortUrl`, `IsCustom`, `views`) VALUES ('$url', '$custom', $iscustom, 0)";
    mysqli_query($dbcon, $insert);
    echo "true " . $weburl . $custom;
  }
}
$history = $_SESSION['json_history'];
$json = json_decode($history ,true);
for ($i=1; $i < 100; $i++) {
  if (!isset($json[$i])) {
    $json[$i] = $custom;
    $_SESSION['json_history'] = json_encode($json);
    exit();
  } else {
    $_SESSION['json_history'] = "";
  }
}
?>
