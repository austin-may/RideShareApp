$(document).ready(function(){
  $('.btn-danger').click(function(){
    $.post("RespondRide.php", {}, function(data) {
    $('#NeedScooped').html(data);
  });
});

// $("#chatwindow").click(function(){
//         $("#chatbox").load("../chat-example/node_modules/express/index.js");
//     });



});
