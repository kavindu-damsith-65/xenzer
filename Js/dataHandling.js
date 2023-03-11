var checkIn = document.getElementById('checkIn');

var docterName = document.getElementById('docterName');

var numRooms = 0;
$(document).ready(function () {
    
    findDoctors("doctorFilterDoctorPage");
    

    findDoctors("doctorFilterMainPage");


});







window.onscroll = scroolLoader;
function scroolLoader() {
    var roomFilterRoomPage = document.getElementById('fullContainer');
    var contentHeight = roomFilterRoomPage.offsetHeight;
    if (window.pageYOffset + window.innerHeight >= contentHeight) {
        numRooms += 2;
       
        findDoctors("doctorFilterDoctorPage", numRooms, append = true);
    }
}

//  find rooms from database
function findDoctors(section, numrooms = 0, append = false, random = false) {
   
    let Data = {
        checkInDate: (random) ? "" : checkIn.value,
     
        docterName: (random) ? "" : docterName.value,
      
        offset: (random) ? "" : numrooms
    };
   
    if (append) {
        $.ajax({
            async: false,
            type: "POST",
            url: "admin/Inc/doctorSelecting.php",
            data: { data: Data, selector: section },
            success: function (Data) {
                $(Data).appendTo('#' + section);
            }
        });
    } else {
      
        numRooms = 0;
        $("#" + section).load(
            "admin/Inc/doctorSelecting.php",
            { data: Data, selector: section },
            function (data) {
                // alert(data);
                if (section == "doctorFilterMainPage") {
                    AOS.init();
                }
            });
    }
}










// var isAvailable = false;
// var checkInDate = document.getElementById('checkInDate');
// var checkOutDate = document.getElementById('checkOutDate');
// var lastCost = document.getElementById('lastCost');

// var date_2 = new Date(checkInDate.value);
// var date_1 = new Date(checkOutDate.value);
// var days = (date_1, date_2) => {
//     let difference = date_1.getTime() - date_2.getTime();
//     let TotalDays = Math.ceil(difference / (1000 * 3600 * 24));
//     return TotalDays;
// }



function placeApp(){
 
    let date=document.getElementById("checkInDate").value;
    let time= document.getElementById("time").value;
    
     if(date=="" || time==""){
       
        $("#errorLog").html("Please fill above fields!");
     }else{
        $("#errorLog").html("");
        $.ajax({  
            async:false,
            type:"POST",  
            url:"admin/Inc/appointment.php",  
            data:{data:{date:date,time:time,doctorId:doctorId},selector:"addapontment"},  
            success:function(Data){
               
                if(Data==""){
                    window.location.href ="myAppointments.php";
                }else{
                    $("#errorLog").html("Something went wrong!");
                }
               }
            });
     }
}



function updateApp(val){
 
    let date=document.getElementById("checkInDate").value;
    let time= document.getElementById("time").value;
    
     if(date=="" || time==""){
       
        $("#errorLog").html("Please fill above fields!");
     }else{
        $("#errorLog").html("");
        $.ajax({  
            async:false,
            type:"POST",  
            url:"admin/Inc/appointment.php",  
            data:{data:{id:val,date:date,time:time,doctorId:doctorId},selector:"updateappointment"},  
            success:function(Data){
               
                if(Data==""){
                    window.location.href ="myAppointments.php";
                }else{
                    $("#errorLog").html("Something went wrong!");
                }
               }
            });
     }
}






function delectAppointment(value){
    
    $.ajax({  
        async:false,
        type:"POST",  
        url:"admin/Inc/appointment.php",  
        data:{data:{deleteId:value},selector:"deleteappintment"},  
        success:function(Data){
           
            if(Data==""){
               
                window.location.href ="myAppointments.php";
            }else{
               alert("Something went wrong!");
            }
           }
        });
}



// function onChange(roomPrice, roomId) {
//     var myData = {
//         checkInDate: checkInDate.value,
//         checkOutDate: checkOutDate.value,
//         roomId: roomId
//     };
//     if (checkInDate.value != "" && checkOutDate.value != "") {
//         $.ajax({
//             async: false,
//             type: "POST",
//             url: "admin/Inc/booking.php",
//             data: { data: myData, selector: "checkavailable" },
//             success: function (Data) {
//                 // alert(Data);
//                 if (Data != "booked") {
//                     $("#availableLable").html("");
//                     $("#checkInBtn").attr({
//                         "data-bs-toggle": 'modal',
//                         'data-bs-target': '#bookingModal',
//                     });
//                     isAvailable = true;
//                 } else {
//                     $("#availableLable").html("Room alrady booked in this Period!!");
//                     $('#checkInBtn').removeAttr('data-bs-toggle data-bs-target');
//                     isAvailable = false;

//                 }
//             }
//         });
//     }
//     let date_2 = new Date(checkInDate.value);
//     let date_1 = new Date(checkOutDate.value);
//     let Days = (days(date_1, date_2));
//     if (isAvailable) {
//         lastCost.innerHTML = "Cost : Rs." + (((Days >= 0) ? Days : 0) * roomPrice) + ".00";
//     } else {
//         lastCost.innerHTML = "Cost : Rs.0.00";
//     }
// }

// function roomBook(price, roomId) {
//     onChange(price, roomId);
//     if (!isAvailable) {
//         document.getElementById("scroolInto").scrollIntoView();
//     } else {
//         enterRoomData(price, roomId);
//         let date_2 = new Date(checkInDate.value);
//         let date_1 = new Date(checkOutDate.value);
//         let Days = (days(date_1, date_2));
//         $("#bookedDate").html("<h6>FROM :  " + checkInDate.value + "</h6><h6> TO : " + checkOutDate.value + "</h6><h4 class='text-info'>Rs." + price * Days + ".00</h4>");
//     }
// }
// function enterRoomData(price, roomId) {
//     var myData = {
//         checkInDate: checkInDate.value,
//         checkOutDate: checkOutDate.value,
//         roomId: roomId,
//         price: price
//     };
//     $.ajax({  
//         type:"POST",  
//         url:"admin/Inc/booking.php",  
//         data:{data:myData,selector:"roomBook"},  
//         success:function(Data){
//            }
//         });
// }


