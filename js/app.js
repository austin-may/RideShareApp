$(document).ready(function(){
  $('.btn-danger').click(function(){
    $.post("RespondRide.php", {}, function(data) {
    $('#NeedScooped').html(data);
  });
});



});
