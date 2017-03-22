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
  ProgressBar("off");
}

});

function ProgressBar(temp) {

if (temp == "on") {

  var myVar = setInterval(myTimer, 100);

  function myTimer() {
      if (counter >= 100) {
        $("#A-1_Progress").css("width", counter + '%');
        //clear once timer ends
        counter = 0;
        clearInterval(myVar);
          $("#A-1_ButtonText").text(" Reset");
      }
      else {
        $("#A-1_Progress").css("width", counter + '%');
        counter++;
       }
     // document.getElementById("A-1_Header").innerHTML = d.toLocaleTimeString();
  }

}
else if (temp == "off") {
  clearInterval(myVar);
  counter = 0;
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
