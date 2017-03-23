$(document).ready(function(){

//Global Counter Array 0-100
var counter = [0,0,0,0,0,0];

//Progress Bar update speed
//           A-1|A-2|A-3|B-1|B-2|B-3
var speed = [500,500,500,500,500,500];

//============================================= A-1 Stuff ==================================================
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

//Loop the things
var myVar;
function ProgressBar(temp) {
    //Button is turned on
    if (temp == "on") {
        //Sprinklers on Pic
        $('#A-1_img').attr('src', 'img/map/watering/A-1_watering.png');
        //Start that glorious interval
        myVar = setInterval(myTimer, speed[0]);//500ms

        //Interval Stuff Inside for Load Bar
        function myTimer() {
            //bar is 100%
            if (counter[0] >= 100) {
              //bar = 100%
                $("#A-1_Progress").css("width", counter[0] + '%');
                //Reset
                counter[0] = 0;
                //Stop Interval
                clearInterval(myVar);
                //Button Text
                $("#A-1_ButtonText").text(" Reset");
                //Sprinklers off Pic
                $('#A-1_img').attr('src', 'img/map/A-1.png');
            }
            else {
              //Fill 100%
              $("#A-1_Progress").css("width", counter[0] + '%');
              //Progress counter == 100
              counter[0]++;
             }
        }
  }
  //Bar filled
  else{
    //100%
    clearInterval(myVar);
    //reset
    counter[0] = 0;
    //bar = 0%
    $("#A-1_Progress").css("width", counter[0]);
    //Sprinklers off Pic
    $('#A-1_img').attr('src', 'img/map/A-1.png');

  }

}//End Progress Bar function

//============================================= End ===============================>>>>>>>


//============================================= A-2 Stuff =================================================

$("#A-2_Button").click(function(){
if ($("#A-2_ButtonText").text() == " Turn On") {

  //Turning Sprinklers On
  $("#A-2_Button").removeClass("btn btn-primary").addClass("btn btn-danger");
  $("#A-2_ButtonText").text(" Turn Off");
  ProgressBarA2("on");
}else {
  //Turning Sprinklers off
  $("#A-2_Button").removeClass("btn btn-danger").addClass("btn btn-primary");
  $("#A-2_ButtonText").text(" Turn On");
    //Button off
  ProgressBarA2("off");
}

});

//Loop the things
var myVarA2;
function ProgressBarA2(temp) {
    //Button is turned on
    if (temp == "on") {
        //Sprinklers on Pic
        $('#A-2_img').attr('src', 'img/map/watering/A-2_watering.png');
        //Start that glorious interval
        myVarA2 = setInterval(myTimer, speed[1]);//500ms

        //Interval Stuff Inside for Load Bar
        function myTimer() {
            //bar is 100%
            if (counter[1] >= 100) {
              //bar = 100%
                $("#A-2_Progress").css("width", counter[1] + '%');
                //Reset
                counter[1] = 0;
                //Stop Interval
                clearInterval(myVarA2);
                //Button Text
                $("#A-2_ButtonText").text(" Reset");
                //Sprinklers off Pic
                $('#A-2_img').attr('src', 'img/map/A-2.png');
            }
            else {
              //Fill 100%
              $("#A-2_Progress").css("width", counter[1] + '%');
              //Progress counter == 100
              counter[1]++;
             }
        }
  }
  //Bar filled
  else{
    //100%
    clearInterval(myVarA2);
    //reset
    counter[1] = 0;
    //bar = 0%
    $("#A-2_Progress").css("width", counter[1]);
    //Sprinklers off Pic
    $('#A-2_img').attr('src', 'img/map/A-2.png');

  }

}//End Progress Bar function

//============================================= A-3 Stuff =================================================

$("#A-3_Button").click(function(){
if ($("#A-3_ButtonText").text() == " Turn On") {

  //Turning Sprinklers On
  $("#A-3_Button").removeClass("btn btn-primary").addClass("btn btn-danger");
  $("#A-3_ButtonText").text(" Turn Off");
  ProgressBarA3("on");
}else {
  //Turning Sprinklers off
  $("#A-3_Button").removeClass("btn btn-danger").addClass("btn btn-primary");
  $("#A-3_ButtonText").text(" Turn On");
    //Button off
  ProgressBarA3("off");
}

});

//Loop the things
var myVarA3;
function ProgressBarA3(temp) {
    //Button is turned on
    if (temp == "on") {
        //Sprinklers on Pic
        $('#A-3_img').attr('src', 'img/map/watering/A-3_watering.png');
        //Start that glorious interval
        myVarA3 = setInterval(myTimer, speed[2]);//500ms

        //Interval Stuff Inside for Load Bar
        function myTimer() {
            //bar is 100%
            if (counter[2] >= 100) {
              //bar = 100%
                $("#A-3_Progress").css("width", counter[2] + '%');
                //Reset
                counter[2] = 0;
                //Stop Interval
                clearInterval(myVarA3);
                //Button Text
                $("#A-3_ButtonText").text(" Reset");
                //Sprinklers off Pic
                $('#A-3_img').attr('src', 'img/map/A-3.png');
            }
            else {
              //Fill 100%
              $("#A-3_Progress").css("width", counter[2] + '%');
              //Progress counter == 100
              counter[2]++;
             }
        }
  }
  //Bar filled
  else{
    //100%
    clearInterval(myVarA3);
    //reset
    counter[2] = 0;
    //bar = 0%
    $("#A-3_Progress").css("width", counter[2]);
    //Sprinklers off Pic
    $('#A-3_img').attr('src', 'img/map/A-3.png');

  }

}//End Progress Bar function

//============================================= B-1 Stuff =================================================

$("#B-1_Button").click(function(){
if ($("#B-1_ButtonText").text() == " Turn On") {

  //Turning Sprinklers On
  $("#B-1_Button").removeClass("btn btn-primary").addClass("btn btn-danger");
  $("#B-1_ButtonText").text(" Turn Off");
  ProgressBarB1("on");
}else {
  //Turning Sprinklers off
  $("#B-1_Button").removeClass("btn btn-danger").addClass("btn btn-primary");
  $("#B-1_ButtonText").text(" Turn On");
    //Button off
  ProgressBarB1("off");
}

});

//Loop the things
var myVarB1;
function ProgressBarB1(temp) {
    //Button is turned on
    if (temp == "on") {
        //Sprinklers on Pic
        $('#B-1_img').attr('src', 'img/map/watering/B-1_watering.png');
        //Start that glorious interval
        myVarB1 = setInterval(myTimer, speed[3]);//500ms

        //Interval Stuff Inside for Load Bar
        function myTimer() {
            //bar is 100%
            if (counter[3] >= 100) {
              //bar = 100%
                $("#B-1_Progress").css("width", counter[3] + '%');
                //Reset
                counter[3] = 0;
                //Stop Interval
                clearInterval(myVarB1);
                //Button Text
                $("#B-1_ButtonText").text(" Reset");
                //Sprinklers off Pic
                $('#B-1_img').attr('src', 'img/map/B-1.png');
            }
            else {
              //Fill 100%
              $("#B-1_Progress").css("width", counter[3] + '%');
              //Progress counter == 100
              counter[3]++;
             }
        }
  }
  //Bar filled
  else{
    //100%
    clearInterval(myVarB1);
    //reset
    counter[3] = 0;
    //bar = 0%
    $("#B-1_Progress").css("width", counter[3]);
    //Sprinklers off Pic
    $('#B-1_img').attr('src', 'img/map/B-1.png');

  }

}//End Progress Bar function

//============================================= B-2 Stuff =================================================

$("#B-2_Button").click(function(){
if ($("#B-2_ButtonText").text() == " Turn On") {

  //Turning Sprinklers On
  $("#B-2_Button").removeClass("btn btn-primary").addClass("btn btn-danger");
  $("#B-2_ButtonText").text(" Turn Off");
  ProgressBarB2("on");
}else {
  //Turning Sprinklers off
  $("#B-2_Button").removeClass("btn btn-danger").addClass("btn btn-primary");
  $("#B-2_ButtonText").text(" Turn On");
    //Button off
  ProgressBarB2("off");
}

});

//Loop the things
var myVarB2;
function ProgressBarB2(temp) {
    //Button is turned on
    if (temp == "on") {
        //Sprinklers on Pic
        $('#B-2_img').attr('src', 'img/map/watering/B-2_watering.png');
        //Start that glorious interval
        myVarB2 = setInterval(myTimer, speed[4]);//500ms

        //Interval Stuff Inside for Load Bar
        function myTimer() {
            //bar is 100%
            if (counter[4] >= 100) {
              //bar = 100%
                $("#B-2_Progress").css("width", counter[4] + '%');
                //Reset
                counter[4] = 0;
                //Stop Interval
                clearInterval(myVarB2);
                //Button Text
                $("#B-2_ButtonText").text(" Reset");
                //Sprinklers off Pic
                $('#B-2_img').attr('src', 'img/map/B-2.png');
            }
            else {
              //Fill 100%
              $("#B-2_Progress").css("width", counter[4] + '%');
              //Progress counter == 100
              counter[4]++;
             }
        }
  }
  //Bar filled
  else{
    //100%
    clearInterval(myVarB2);
    //reset
    counter[4] = 0;
    //bar = 0%
    $("#B-2_Progress").css("width", counter[4]);
    //Sprinklers off Pic
    $('#B-2_img').attr('src', 'img/map/B-2.png');

  }

}//End Progress Bar function

//============================================= B-3 Stuff =================================================

$("#B-3_Button").click(function(){
if ($("#B-3_ButtonText").text() == " Turn On") {

  //Turning Sprinklers On
  $("#B-3_Button").removeClass("btn btn-primary").addClass("btn btn-danger");
  $("#B-3_ButtonText").text(" Turn Off");
  ProgressBarB3("on");
}else {
  //Turning Sprinklers off
  $("#B-3_Button").removeClass("btn btn-danger").addClass("btn btn-primary");
  $("#B-3_ButtonText").text(" Turn On");
    //Button off
  ProgressBarB3("off");
}

});

//Loop the things
var myVarB3;
function ProgressBarB3(temp) {
    //Button is turned on
    if (temp == "on") {
        //Sprinklers on Pic
        $('#B-3_img').attr('src', 'img/map/watering/B-3_watering.png');
        //Start that glorious interval
        myVarB3 = setInterval(myTimer, speed[5]);//500ms

        //Interval Stuff Inside for Load Bar
        function myTimer() {
            //bar is 100%
            if (counter[5] >= 100) {
              //bar = 100%
                $("#B-3_Progress").css("width", counter[5] + '%');
                //Reset
                counter[5] = 0;
                //Stop Interval
                clearInterval(myVarB3);
                //Button Text
                $("#B-3_ButtonText").text(" Reset");
                //Sprinklers off Pic
                $('#B-3_img').attr('src', 'img/map/B-3.png');
            }
            else {
              //Fill 100%
              $("#B-3_Progress").css("width", counter[5] + '%');
              //Progress counter == 100
              counter[5]++;
             }
        }
  }
  //Bar filled
  else{
    //100%
    clearInterval(myVarB3);
    //reset
    counter[5] = 0;
    //bar = 0%
    $("#B-3_Progress").css("width", counter[5]);
    //Sprinklers off Pic
    $('#B-3_img').attr('src', 'img/map/B-3.png');

  }

}//End Progress Bar function


//=======================================  Code Abyss =========================================

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
 // document.getElementById("A-1_Header").innerHTML = d.toLocaleTimeString();

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



});
