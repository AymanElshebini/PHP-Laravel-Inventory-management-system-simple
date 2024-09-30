



function test() {
    var mytest =document.getElementById("mytest");
    alert('test');
}
/*--------------valadation-------*/
//login
function ValadationLogin() {

    'use strict'
    var email =document.getElementById("email"),
        password =document.getElementById("password");
    var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if ($(email).val() == "") {
        swal("أدخل البريد الالكتروني  !");
        email.focus;

        return false;
    }

    else if (!filter.test(email.value)) {
        swal('البريد الالكتروني غير صحيح !');
        email.focus;
        return false;
    }

    else if($(password).val() == "") {
        swal('أدخل كلمة المرور !');
        password.focus;
        return false;

    }

    else
    {
        return true;
    }

}
//user create
function ValadationUsers() {
    'use strict'


    var Useremail =document.getElementById("Useremail"),
        Password =document.getElementById("Password"),
        Fullname =document.getElementById("Fullname"),
        userphone = document.getElementById("userphone"),
        cou_id= document.getElementById('cou_id'),
        address=document.getElementById("address");


    var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var phoneno = /^\d{10}$/;

    if ($(Useremail).val() == "") {
        swal("please Enter your Email  !");
        Useremail.focus;

        return false;
    }

    else if (!filter.test(Useremail.value)) {
        swal('your Email incorrect !');
        Useremail.focus;
        return false;
    }

    if ($(Password).val() == "") {
        swal('please Enter your Password !');
        Password.focus;
        return false;
    }

    else if ($(Fullname).val() == "") {
        swal("please Enter your Fullname !");
        Fullname.focus;

        return false;
    }
    else if ($(cou_id).val() == 0) {
        swal("please select your cuntery !");
        return false;
    }


    else if ($(userphone).val() == "") {
        swal("please Enter your phone !");
        userphone.focus;

        return false;
    }



    else if (!phoneno.test(userphone.value)) {

        swal('Phone less than 11 numbers');


        return false;

    }


    else if ($(address).val() == "") {
        swal("please Enter your Address !");
        address.focus;

        return false;
    }



    else {
        return true;
    }


}
//contact us
function valadationConTactUs()
{
    'use strict'

       var name =document.getElementById("name"),
        email =document.getElementById("email"),
        phone = document.getElementById("phone"),
        subject=document.getElementById("subject"),
        message=document.getElementById("message");


    var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var phoneno = /^\d{10}$/;

    if ($(name).val() == "") {
        swal("أدخل الاسم بالكامل  !");
        name.focus;

        return false;
    }

    if ($(email).val() == "") {
        swal("أدخل البريد الالكتروني  !");
        email.focus;

        return false;
    }
    else if (!filter.test(email.value)) {
        swal('صيغة البريد غير صحيحة !');
        email.focus;
        return false;
    }



    else if ($(phone).val() == "") {
        swal("أدخل رقم التليفون !");
        phone.focus;

        return false;
    }




    else if ($(subject).val() == "") {
        swal("ادخل عنوان االرسالة !");
        subject.focus;

        return false;
    }


    else if ($(message).val() == "") {
        swal("أدخل تفاصيل الرسالة !");
        message.focus;

        return false;
    }

    else {
        return true;
    }



}

/*--------------valadation-------*/
//remove space from textara
$('document').ready(function()
{
    $('#fullDesc').each(function(){
            $(this).val($(this).val().trim());
        }
    );
});




