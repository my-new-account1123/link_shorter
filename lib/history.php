<?php
session_start();

include '../config.php';
include 'mysql.php';

if (!isset($_SESSION['json_history'])) {
  $_SESSION['json_history'] = "";
}

$history = $_SESSION['json_history'];

$json = json_decode($history ,true);

if ($json['1'] == "") {
  exit();
}
?>

<table class="highlight">
  <thead>
    <tr>
        <th data-field="url">Сокращенный URL</th>
        <th data-field="short">Введенный Url</th>
    </tr>
  </thead>
  <tbody>


<?php
for ($i=0; $i < 1; $i++) {
  $curr = count($json) - $i;
  if ($curr < count($json) - 5) {
    exit();
  }
  if (!isset($json[$curr])) {
    exit();
  }
  $code = $json[$curr];
  $verify = "SELECT * FROM `shorturls` WHERE `ShortUrl` = '$code'";
  $run = mysqli_query($dbcon, $verify);
  if (mysqli_num_rows($run) == 1) {
    $row = mysqli_fetch_array($run);
    $url = $row['URL'];
  } else {
    $url = "Not Found.";  
  }
?>
      <tr>
      <td><a href="<?php echo $url ?>"><?php echo $weburl . $json[$curr]; ?></a></td>
      <td><a href="<?php echo $url ?>"><?php echo $url ?></a></td>
      </tr>


<?php
}
?>

  </tbody>
</table>
