<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <meta charset="utf-8">
  <title>link</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="input-field col s6">
        <input type="text" id="url" value="" placeholder="http://google.com/" autocomplete="off" class="form-control" required>
      </div>
      <div class="input-field col s3">
        <input type="text" id="customurl" value=""autocomplete="off" data-position="bottom" data-delay="50" data-tooltip="<?=$customurltip?>" required>
      </div>
      <div class="input-field col s1">
        <a class="btn btn-success waves-effect waves-light" onclick="shortUrl()">submit</a>
      </div>
    </div>
    <div id="table">
    </div>
  </div>
  <script src="js/app.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
</body>
</html>


