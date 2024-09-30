//---------Valadation User-----------/
function ValadationUsers() {
    'use strict'


    var name =document.getElementById("name"),
        email =document.getElementById("email"),
        password =document.getElementById("password");



    var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


  if ($(name).val() == "") {
        swal("please Enter your Fullname !");
        name.focus;

        return false;
    }


    if ($(email).val() == "") {
        swal("please Enter your Email  !");
        email.focus;

        return false;
    }

    else if (!filter.test(email.value)) {
        swal('your Email incorrect !');
        email.focus;
        return false;
    }

    if ($(password).val() == "") {
        swal('please Enter your Password !');
        password.focus;
        return false;
    }










    else {
        return true;
    }


}
//---------./Valadation User-----------/


//---------Valadation Catogery -----------/
function validateCat() {

    var name = document.getElementById('name'),
        imgpath = document.getElementById('imgpath'),
        FileUploadPath = imgpath.value;


    if (name.value == "") {
        swal("أدخل القسم!");
        return false;

    }

    if (name.value.length < 4) {
        swal("أسم القـسم لايقل عن 3 حروف !");
        return false; // keep form from submitting
    }


    else if (FileUploadPath == '') {
        swal("أدخل صورة القسم  !");
        return false;

    }


    else {
        return true;
    }
}
//---------./Valadation Catogery -----------/

//---------Valadation products  -----------/
function VProducts()
{
   // var category_id = document.getElementById("category_id");
    var name =document.getElementById("name");
    var sale_price = document.getElementById("sale_price");
    var fullDesc = document.getElementById("fullDesc");
    var imgpath = document.getElementById('imgpath');
    var FileUploadPath = imgpath.value;

   /* if (category_id.value == "0") {
        swal("أدخل القسم  !");
        return false;

    }
*/
    if (name.value == "") {
        swal("أدخل أسم المنتج!");
        return false;
    }

    if (name.value.length < 4) {
        swal("أسم القـسم لايقل عن 3 حروف !");
        return false; // keep form from submitting
    }

    if (sale_price.value == "")
    {
        swal("أدخل سعر المنتج!");
        return false;
    }

    if(trimfield(fullDesc.value) == '')
    {
        swal("أدخل وصـف المنتج!");
        fullDesc.focus();
        return false;
    }

    if (FileUploadPath == '') {
        swal("أدخل صورة القسم  !");
        return false;


    }


    else {
        return true;
    }
}
//---------./Valadation products  -----------/

//---------Images valadation-----------/
function ValidateFileUpload() {
    var fuData = document.getElementById('imgpath');
    var FileUploadPath = fuData.value;

//To check if user upload any file
    if (FileUploadPath == '') {
        swal("أدخل صورة القسم  !");

    } else {
        var Extension = FileUploadPath.substring(
            FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

        if (Extension == "gif" || Extension == "png" || Extension == "bmp"
            || Extension == "jpeg" || Extension == "jpg") {

// To Display
            if (fuData.files && fuData.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(fuData.files[0]);
            }

        }

//The file upload is NOT an image
        else {
            swal(" يسمح بأدخال الصور فقط !! ");

        }
    }
}
//---------./Images valadation-----------/



// Valadation for Accipt only numbers ///
function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}
// Valadation for Accipt only numbers ///



//============Start block for Offer products show and hiden ==================//
function yesnoCheck(that) {
    if (that.value == "1") {
//  alert("check");
        document.getElementById("if_offer").style.display = "block";
    } else {
        document.getElementById("if_offer").style.display = "none";
    }
}
//============End block for Offer products show and hiden ==================//

//remove space
function trimfield(str)
{
    return str.replace(/^\s+|\s+$/g,'');
}


//remove space from textara
$('document').ready(function()
{
    $('#fullDesc').each(function(){
            $(this).val($(this).val().trim());
        }
    );
});


/*Delate*/




//  model Delete unit
$(document).ready(function () {

    var $deleteunit=$('.delete-unit');
    var $deletewindow=$('#delete_window');
    var $unitId=$('#unit_id');
    $deleteunit.on('click',function ( element ) {
        element.preventDefault();
        var unit_id=$(this).data('unitid');
        $unitId.val(unit_id);
        $deletewindow.modal('show');
    });
});
//  ./model Delete unit


//  model edit unit
$(document).ready(function () {


    var $editUnit=$('.edit-unit');
    var $editWindow=$('#edit-window');
    var $edit_unit_name=$('#edit_unit_name');
    var $edit_unit_id=$('#edit_unit_id');

    $editUnit.on('click',function ( element ) {
        element.preventDefault();
       var unit_id = $(this).data('id');
       var unitName=$(this).data('name');


       $edit_unit_id.val(unit_id);
       $edit_unit_name.val(unitName);
        $editWindow.modal('show');

    });

});
//  ./model edit unit




