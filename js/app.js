$(document).ready(function(){
  $('.scoop').click(function(){
    $.post("RespondRide.php", {}, function(data) {
    $('#NeedScooped').html(data);
  });
});



});
