getHistory();
function getHistory() {
  $.get("lib/history.php", function(currhistory) {
    $("#table").html(currhistory);
  });
}
function shortUrl() {
  var url = $("#url").val();
  var custom = $("#customurl").val();
  if (url !== "") {
    var data = {
      shorturl: url,
      customurl: custom
    };
    $.post("lib/api.php", data, function(response) {
      if (response.includes("true")) {
        var split = response.split(" ");
        $("#url").val(split[1]);
      } 
    });
  } 
  getHistory();
}
