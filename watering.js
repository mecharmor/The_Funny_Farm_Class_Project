$(document).ready(function(){
//Global Counter
var counter = 0;

//Sprinklers on/off
$("#A-1_SprinklerCheckbox").click(function(){

  //If sprinkler checkbox is checked
  if ($('#A-1_SprinklerCheckbox').prop('checked')) {
    $('#A-1_SprinklerPicture').attr('src', 'img/reggie/Sprinkler.gif');
}
//Not checked
else {
    $('#A-1_SprinklerPicture').attr('src', 'img/reggie/Sprinkler_off.png');
}

});


//Make Modal Timer Move
$("#A-1_Button").click(function(){

  var myVar = setInterval(myTimer, 1000);

  function myTimer() {
      var d = new Date();
      $("#A-1_Progress").css("width", counter);
      counter++;
      document.getElementById("A-1_Header").innerHTML = d.toLocaleTimeString();
  }

});



});
