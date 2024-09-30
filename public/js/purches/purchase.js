
$(function () {
    $(".accordion-btn").on("click", function () {
        $(this).next(".accordion-list").slideToggle();
        $(".accordion-line", this).toggleClass("active");
    });
});




$(document).ready(function () {
    $('.add-product-btn').on('click',function (e) {



        e.preventDefault(); // not do refrache to page
        var name=$(this).data('name');
        var id=$(this).data('id');
        var sellprice=$(this).data('sellprice');


        $(this).removeClass('btn-success').addClass('btn-secondary disabled');

        var  html='<tr><td><input type="text" class="form-control" id="product_id" '+ 'value='+ id +' name="product_id[]"\n' +' placeholder="proid"></td> ';

        html+='<td><select id="unit_id" name="unit_id" class="form-control">'+
            ' <option value="0">@lang('siteAr.all_categories')</option>@foreach ($units as $unit)'+
        '<option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }}'+
        ' </option>@endforeach</select></td>';

        // html+='<td>  <input type="text" class="form-control" id="unit_id"  name="unit_id[]" placeholder="unit_id"></td>';
        html+='<td> <input type="number" class="form-control" id="quantity"  name="quantity[]" placeholder="quantity" min="1" value="1"></td>';
        html+='<td><input type="text" class="form-control" id="prochePrice" name="prochePrice[]"placeholder="prochePrice"></td>';
        html+='<td><input type="text" class="form-control" id="discount"  name="discount[]" placeholder="discount"></td>';
        html+='<td> <input type="text" class="form-control" id="totalPrice"  name="totalPrice[]" placeholder="totalPrice"></td>';
        html+='<td><button class="btn btn-danger btn-sm remove-product-btn" data-id="'+ id +'"><span class="fa fa-trash"></span> </button> </td>'








        $(function () {


            $("#quantity, #prochePrice ,#discount").keyup(function () {



                $("#totalPrice").val (+$("#quantity").val() * $("#prochePrice").val()- $("#discount").val());



            });
        });




        $('.order-list').append(html);
        //    alert(sellprice);
    });
    // disabeld btn after click
    $('body').on('click','.disabled',function (e) {

        e.preventDefault();
    });

    // remove btn
    $('body').on('click','.remove-product-btn',function (e) {
        e.preventDefault();
        var id =$(this).data('id');
        //  console.log(id);
        $(this).closest('tr').remove();

        $('#product-'+id).removeClass('btn-success disabled').addClass('btn-success ');
    });





});



