$(document).ready(function(){

  $('#message-form').submit(function(e){

    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "async_build_message.php",
      data: $('#message-form').serialize(),
      success: function(result){
        sendMessage( result );
      },
      error: function(){
        alert("Failed to send message");
      }
    });
    
  });
})

function sendMessage( result )
{
  alert("Send the following Message:\n" +  result );
  
}