var userName=document.getElementById("userName");
var email=document.getElementById("email");
var phoneNumber=document.getElementById("phoneNumber");

var password=document.getElementById("password");
var passConform=document.getElementById("passConform");
var passwordLabel=document.getElementById("passwordLabel");
var passConformLabel=document.getElementById("passConformLabel");
var dateOfBirthLabel=document.getElementById('dateOfBirthLabel');

var userEmailLog=document.getElementById("userEmailLog");
var passwordLog=document.getElementById("passwordLog");
var passwordLogLabel=document.getElementById('passwordLogLabel');

const name = /^([a-zA-Z][a-zA-Z0-9 _]*)$/;
const Email=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
const phone= /^\d{10}$/;
const pin=/\d+/;

const arr=[[name,userName,"Name Invalied"],
[Email,email,"Invalied Email",email],
[phone,phoneNumber,"Invalied Phone Number"],

];




function submitData(){
    var isValied=true;
    arr.forEach(element => {
        var check=checkData(element);
        isValied=isValied?check:false;
    }); 

  
    
    
    if(isValied){   
    var userData={uName:userName.value,   //Enter Data to the dataBase
                   uEmail:email.value,
                   uPhone:phoneNumber.value,
                   uPassword:password.value,
                   
               }
  
    enterUserData(userData,"register");    
    }
}
             
function checkData(element){
    if(!element[0].test(element[1].value)){
        changeData(element);
        return false;
    }
    else{
        element[1].classList.remove('placeholderColor');
        return true;
    } 
}

function changeData(element){
    element[1].value="";
    element[1].classList.add('placeholderColor');
    element[1].placeholder=element[2];
}


function enterUserData(userData,enterdata){
    let isValied=true;
   
    $.ajax({  
        async: false,
        type:"POST",  
        url:"Inc/addDoctorData.php",  
        data:{user:userData,enterData:enterdata},  
        success:function(Data){
           
            if(Data=="succeed"){
                window.location.href ="user-queries.php";
            }else{
               isValied=false;
            }
        }  
     }); 
    return isValied;

}





