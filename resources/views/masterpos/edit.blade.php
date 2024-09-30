@extends('layouts.app')
<style>
    .accordion-btn {
        position: relative;
        width: 100%;
        text-align: left;
        color: #ffffff;
        background: #000000;
        padding: 15px 25px;
        border-bottom: 1px solid #ffffff;
    }

    .accordion-btn span {
        position: absolute;
        background: #ffffff;
        transition: transform 0.5s, opacity 0.5s;
    }

    .accordion-line:nth-child(1) {
        top: 50%;
        right: 44px;
        width: 16px;
        height: 4px;
    }

    .accordion-line:nth-child(2) {
        top: 39%;
        right: 50px;
        width: 4px;
        height: 16px;
    }

    .accordion-line.active:nth-child(1) {
        opacity: 0;
    }

    .accordion-line.active:nth-child(2) {
        transform: rotate(90deg);
    }

    .accordion-list,
    .accordion-list-js {
        background: #f7f7f7;
        color: #333333;
    }

    .accordion-list {
        display: none;
    }

    .accordion-list-js {
        height: 0;
        opacity: 0;
        visibility: hidden;
        overflow: hidden;
        transition: all 0.5s;
    }

    .accordion-list-js.open {
        height: 275px;
        opacity: 1;
        visibility: visible;
    }

    .accordion-item {
        padding: 15px 25px;
        border-bottom: 1px solid #afaeae;
    }
</style>
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        المابيعات

                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-left: 12px">

                        </div>


                        <div class="row">
                            <!--products-->
                            <div class="col-md-4">
                                <div class="card">

                                    <div class="card-header">
                                        <div class="toolBar">

                                            <form action="{{ route('masterpos.create') }}" method="get">
                                                <div class="row">


                                                    <div class="col-md-4" style="text-align: right">



                                                        <a href="{{ route('masterpos.create') }}" class="btn btn-success">
                                                            <i class="fa fa-refresh" aria-hidden="true">

                                                            </i>
                                                        </a>
                                                    </div>

                                                    <div class="col-md-8">


                                                        <div class="input-group">
                                                            <input type="text" name="search" class="form-control filter" autocomplete="on"
                                                                   placeholder="@lang('siteAr.search')"
                                                                   value="{{ request()->search }}">

                                                            <select name="category_id" class="form-control">
                                                                <option value="">@lang('siteAr.all_categories')</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}" {{ request()->category_id
                                                    == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>


                                                            <button type="submit" id="searchsubmit" value="Search" class="btn btn-success searchsubmit">
                                                                <span class="fa fa-search"></span>

                                                            </button>

                                                        </div>
                                                    </div>


                                                </div>

                                            </form>







                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="container">
                                            @foreach($categories as $index=>$cat)
                                                <div scope="row">

                                                    <div class="container" style="margin:0px auto">

                                                        <button class="accordion-btn">{{$cat->name}}
                                                            <span class="accordion-line"></span>
                                                            <span class="accordion-line"></span></button>
                                                        <ul class="accordion-list">


                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">المنتج</th>
                                                                    <th scope="col">السعر</th>
                                                                    <th scope="col">أضف</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>

                                                                    @foreach($cat->products as $product)
                                                                        <td>

                                                                            <img src="{{$product->imgpath}}"
                                                                                 alt="{{$product->name}}"

                                                                                 class="img-thumbnail images" style="width: 50px; height: 50px">


                                                                        </td>
                                                                        <td>  {{$product->name}}</td>

                                                                        <td> {{$product->sellprice}}</td>
                                                                        <td> <a href=""

                                                                                id="product-{{$product->id}}"
                                                                                data-id="{{$product->id}}"
                                                                                data-name="{{$product->name}}"
                                                                                data-sellprice="{{$product->sellprice}}"




                                                                                class="btn btn-success btn-sm add-product-btn">+</a></td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>





                                                        </ul>

                                                    </div>



                                                </div>



                                            @endforeach
                                        </div>






                                    </div>
                                </div>
                            </div>
                            <!--products-->
                            <div class="col-md-8">
                                <div class="continer">


                                    التفاصيل البيع
                                    <div class="card-body">

                                        <form action="#" class="row" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <!--Master-->
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="date"  name="id"

                                                       placeholder="id">
                                            </div>
                                            <!--CODE-->
                                            <div class="form-group ">
                                                <label for="code">كود الفاتورة</label>
                                                <input type="text" class="form-control"
                                                       value="{{$masterpos->code}}"
                                                       readonly
                                                       id="code" name="code" placeholder="Enter code" required>
                                            </div>
                                            <!--.CODE-->

                                            <div class="form-group">
                                                <label for="date">التاريخ</label>
                                                <input type="text" class="form-control " id="date"  name="date"
                                                       value="{{$masterpos->date}}"
                                                       placeholder="التاريخ">
                                            </div>

                                            <div class="form-group">
                                                <label for="cust_id">العملاء</label>

                                                <select id="cust_id" name="cust_id" class="form-control">

                                                    <option value="0">@lang('siteAr.all_categories')</option>
                                                    @foreach ($customers as $cust)
                                                        <option value="{{ $cust->id }}"
                                                                {{$masterpos->cust_id == $cust->id ? 'selected' : '' }}>{{ $cust->name }}</option>
                                                    @endforeach

                                                </select>

                                            </div>


                                            <div class="form-group">
                                                <label for="orderstatsid">حالة الفاتور </label>

                                                <select id="orderstatsid" name="orderstatsid" class="form-control">
                                                    <option value="0">@lang('siteAr.all_categories')</option>

                                                    @foreach ($orderstats as $stator)
                                                        <option value="{{ $stator->id }}"
                                                                {{$masterpos->orderstatsid == $stator->id ? 'selected' : '' }}>{{$stator->name }}
                                                        </option>
                                                    @endforeach

                                                </select>

                                            </div>


                                            <div class="form-group">
                                                <label for="inv_total">أجمالي قبل الخصم</label>
                                                <input type="text" class="form-control inv_totale" id="inv_total"  name="inv_total" value="{{$masterpos->inv_total}}"  placeholder="inv_total" >
                                            </div>

                                            <div class="form-group">
                                                <label for="shiping_cost">تكلفة الشحن </label>
                                                <input type="text" class="form-control shiping_cost" id="shiping_cost"  name="shiping_cost" value="{{$masterpos->shiping_cost}}"

                                                       placeholder="shiping_cost">
                                            </div>

                                            <div class="form-group">
                                                <label for="inv_disc">خصم الفاتورة</label>
                                                <input type="text" class="form-control inv_disc" id="inv_disc"  name="inv_disc"  value="{{$masterpos->inv_disc}}"

                                                       placeholder="inv_disc">
                                            </div>

                                            <div class="form-group">
                                                <label for="total">الاجمالي</label>
                                                <input type="text" class="form-control total" id="total"  name="total"  value="{{$masterpos->total}}"
                                                       placeholder="total">
                                            </div>



                                            <label for="memo">ملاحظات </label>
                                            <input type="text" class="form-control" id="total"  name="memo"  value="{{$masterpos->memo}}"
                                                   style="width: 100%; height: 100px"
                                                   placeholder="memo">




                                            <!--Master-->

                                            <!--Deiteliles-->

                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table"  id="invoice_details">

                                                            <input type="hidden" class="form-control" id="masterpos_id"  name="masterpos_id"
                                                                   placeholder="masterpos_id">
                                                            <thead>
                                                            <tr>

                                                                <th scope="col">product_id</th>
                                                                <th scope="col">صورة المنتج</th>
                                                                <th scope="col">أسم المنتج</th>
                                                                <th scope="col">الكمية</th>
                                                                <th scope="col">سعر البيع </th>
                                                                <th scope="col">الخصم</th>
                                                                <th>totalPrice</th>
                                                                <th>action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="order-list">
                                                            @foreach($detailspos as $index=>$dpos)
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="product_id" value="{{$dpos->product_id}}"  placeholder="proid">

                                                                   </td>

                                                                    <td>
                                                                        <img src="{{$dpos->product->imgpath}}"
                                                                             alt="{{$dpos->product->name}}"

                                                                             class="img-thumbnail images" style="width: 50px; height: 50px">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="product_id" value="{{$dpos->product->name}}"  placeholder="proid">



                                                                    </td>

                                                                    <td>
                                                                        <input type="text" class="form-control" id="quantity" value="{{$dpos->quantity}}"  placeholder="quantity">

                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="sellPrice" value="{{$dpos->sellPrice}}"  placeholder="quantity">


                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="discount" value="{{$dpos->discount}}"  placeholder="quantity">



                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control" id="totalPrice" value="{{$dpos->totalPrice}}"  placeholder="quantity">



                                                                    </td>
                                                                    <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="'+ id +'"><span class="fa fa-trash"></span> </button> </td>
                                                                </tr>
                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                            <!--Deiteliles-->
                                            <div class="col-md-6 col-md-12 text-right">
                                               <span>

                                            <label for="sub_total">الاجمالي</label>
                                                <input type="text" class="mysubtotal" id="mysubtotal"    >


                                                 </span>
                                            </div>

                                            <div class="form-group col-md-6 col-md-12 text-center buttons-container">

                                                <button type="submit" class="btn btn-primary">
                                                    حفـظ
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </button>
                                                <a href=""  class="btn btn-primary">
                                                    الغاء
                                                    <i class="fa fa-undo" aria-hidden="true"></i>
                                                </a>

                                            </div>
                                        </form>




                                    </div>



                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //accordion
        $(function () {
            $(".accordion-btn").on("click", function () {
                $(this).next(".accordion-list").slideToggle();
                $(".accordion-line", this).toggleClass("active");
            });
        });

        //./accordion


        $(document).ready(function () {
            $('.add-product-btn').on('click',function (e) {

                e.preventDefault(); // not do refrache to page
                var id=$(this).data('id');
                var name=$(this).data('name');
                var imgpath=$(this).data("imgpath");
                var sellprice=$(this).data('sellprice');


                //   alert(imgpath);

                $(this).removeClass('btn-success').addClass('btn-secondary disabled');

                var html='';
                html += '<tr>';

                html+='<td><input type="text" class="form-control" id="product_id" '+ 'value='+ id +' name="product_id[]"\n' +' placeholder="proid"></td> ';

                html+='<td><img src="{{$dpos->product->imgpath}}"alt="{{$dpos->product->name}}"class="img-thumbnail images" style="width: 50px; height: 50px"></td> ';



                html+='<td> <input type="text" class="form-control" id="product_id" value="{{$dpos->product->name}}"  placeholder="proid"></td> ';
                //  html+='<td><input type="text" class="form-control" id="name" '+ 'value='+ name +' name="name[]"\n' +' placeholder="name"></td> ';
                html+='<td> <input type="number" class="form-control input" id="quantity"  name="quantity[]" placeholder="quantity" min="1" value="1"></td>';
                html+='<td><input type="text" class="form-control input" id="sellPrice" '+'value='+ sellprice +' name="sellPrice[]"\n'+' placeholder="sellPrice"></td>';

                html+='<td><input type="text" class="form-control input" id="discount"  name="discount[]" placeholder="discount" value="0"></td>';
                html+='<td> <input type="text" class="form-control totalPrice" id="totalPrice"  name="totalPrice[]" placeholder="totalPrice"></td>';
            html+='<td><button class="btn btn-danger btn-sm remove-product-btn" data-id="'+ id +'"><span class="fa fa-trash"></span> </button> </td><tr/>'
/*
                html+='<td><form action="{{route('masterpos.DetailsposDelete',$dpos->id)}}" method="post" style="display: inline-block" >'
                       +'{{csrf_field()}}'
                        +'{{method_field('delete')}}'+

                    '<button type="submit"  class="btn btn-danger delete btn-sm" data-id="'+ id +'" ><i class="fa fa-trash"></i> </button>'+


               ' </form></td><tr/>'

*/




                /* colcation invoice Detiles*/
                $('#invoice_details').on('keyup blur','#quantity',function () {

                    let $row=$(this).closest('tr');
                    let quantity=$row.find('#quantity').val() || 0;
                    let sellPrice=$row.find('#sellPrice').val() || 0;
                    let discount=$row.find('#discount').val() || 0;

                    $row.find('#totalPrice').val((quantity*sellPrice - discount).toFixed(2));

                    $('#mysub_total').val(sum_total('#totalPrice'));
                    // final total
                    var sum = 0;
                    $(".totalPrice").each(function(){
                        sum += +$(this).val();
                    });
                    $(".mysubtotal").val(sum);
                    $("#inv_total").val(sum);
                });

                $('#invoice_details').on('keyup blur','#sellPrice',function () {

                    let $row=$(this).closest('tr');
                    let quantity=$row.find('#quantity').val() || 0;
                    let sellPrice=$row.find('#sellPrice').val() || 0;
                    let discount=$row.find('#discount').val() || 0;

                    $row.find('#totalPrice').val((quantity*sellPrice - discount).toFixed(2));
                    $row.find('#totalPrice').val((quantity*sellPrice - discount).toFixed(2));
                    // final total
                    var sum = 0;
                    $(".totalPrice").each(function(){
                        sum += +$(this).val();
                    });
                    $(".mysubtotal").val(sum);
                    $("#inv_total").val(sum);

                });
                $('#invoice_details').on('keyup blur','#discount',function () {

                    let $row=$(this).closest('tr');
                    let quantity=$row.find('#quantity').val() || 0;
                    let sellPrice=$row.find('#sellPrice').val() || 0;
                    let discount=$row.find('#discount').val() || 0;

                    $row.find('#totalPrice').val((quantity*sellPrice - discount).toFixed(2));
                    $row.find('#totalPrice').val((quantity*sellPrice - discount).toFixed(2));
                    // final total
                    var sum = 0;
                    $(".totalPrice").each(function(){
                        sum += +$(this).val();
                    });
                    $(".mysubtotal").val(sum);
                    $("#inv_total").val(sum);

                });





                $(document).on("keyup blur", ".totalPrice", function() {
                    var sum = 0;
                    $(".totalPrice").each(function(){
                        sum += +$(this).val();
                    });
                    $(".mysubtotal").val(sum);
                    $("#inv_total").val(sum);
                });


                /*./colcation invoice Detiles*/


// total



                /*
                                $(document).ready(function(){
                                    var inv_total=$("#inv_total");
                                    inv_total.keyup(function(){
                                        var total=isNaN(parseInt(inv_total.val()+ $("#shiping_cost").val()))
                                        $("#total").val(total);
                                    });
                                });
                */





                //    });



                /* ./colcation invoice*/

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



    </script>
@endsection