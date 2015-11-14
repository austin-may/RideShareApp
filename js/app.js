$(document).ready(function(){
  $('.btn-danger').click(function(){
    $.post("RespondRide.php", {}, function(data) {
    $('#NeedScooped').html(data);
  });


});


$(function(){
    $(document).on("click",".pickupbtn",function(){
      var name = this.id;
      $.ajax({
          type: 'POST',
          url: 'login.php',
          data: { 'rider': name},
          success:function(){
            alert("You have notified " + name + " that you can pick them up!");
          }
      });
    });
});

});
