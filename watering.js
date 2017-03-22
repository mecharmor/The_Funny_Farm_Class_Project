$(document).ready(function(){
//Global Counter
var counter = 0;

//Sprinklers on/off
// $("#A-1_SprinklerCheckbox").click(function(){
//
//   //If sprinkler checkbox is checked
//   if ($('#A-1_SprinklerCheckbox').prop('checked')) {
//     $('#A-1_SprinklerPicture').attr('src', 'img/reggie/Sprinkler.gif');
// }
// //Not checked
// else {
//     $('#A-1_SprinklerPicture').attr('src', 'img/reggie/Sprinkler_off.png');
// }
//
// });

$("#A-1_Button").click(function(){
//$('#A-1_SprinklerPicture').attr('src', 'img/reggie/Sprinkler.gif');

if ($("#A-1_ButtonText").text() == " Turn On") {

  //Turning Sprinklers On
  $("#A-1_Button").removeClass("btn btn-primary").addClass("btn btn-danger");
  $("#A-1_ButtonText").text(" Turn Off");
  ProgressBar("on");
}else {
  //Turning Sprinklers off
  $("#A-1_Button").removeClass("btn btn-danger").addClass("btn btn-primary");
  $("#A-1_ButtonText").text(" Turn On");
    //Button off
  ProgressBar("off");
}

});

function ProgressBar(temp) {
//Button is turned on
if (temp == "on") {

  //Sprinklers on Pic
  $('#A-1_img').attr('src', 'img/map/watering/A-1_watering.png');
  //Start that glorious loop
  var myVar = setInterval(myTimer, 500);

  function myTimer() {
      //once progress bar reaches 100%
      if (counter >= 100) {
        $("#A-1_Progress").css("width", counter + '%');
        //clear once timer ends
        counter = 0;
        clearInterval(myVar);
          $("#A-1_ButtonText").text(" Reset");
          //Sprinklers off Pic
          $('#A-1_img').attr('src', 'img/map/A-1.png');
      }
      else {
        //Fill to 100%
        $("#A-1_Progress").css("width", counter + '%');
        //Progress counter to 100
        counter++;
       }
     // document.getElementById("A-1_Header").innerHTML = d.toLocaleTimeString();
  }

}
//if button is turned off
else if (temp == "off") {
  //kill loop
  clearInterval(myVar);
  //reset
  counter = 0;
  //set bar to 0%
  $("#A-1_Progress").css("width", counter);
}

}


// //Progress Bar Moving
// function ProgressLoader(){
//
//   var myVar = setInterval(myTimer, 1000);
//
//   function myTimer() {
//       var d = new Date();
//       $("#A-1_Progress").css("width", counter);
//       counter++;
//       document.getElementById("A-1_Header").innerHTML = d.toLocaleTimeString();
//   }

//});



});
