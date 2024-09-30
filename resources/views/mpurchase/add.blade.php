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
                        فاتورة المشتريات

                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-left: 12px">

                        </div>


                        <div class="row">
                            <!--products-->
                            <div class="col-md-3">
                                <div class="card">

                                        <div class="toolBar">


                                            <div class="toolBar-search">


                                            </div>
                                        </div>
                                    <div class="card-body">

                                       <!--products-->

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




                                                                                class="btn btn-success btn-sm add-product-btn">+</a></td>
                                                                    </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>





                                                        </ul>

                                                    </div>



                                                </div>



                                            @endforeach




                                        <!--./products-->
                                    </div>
                                </div>
                            </div>
                            <!--purchase-->
                            <div class="col-md-9">


                                    <div class="card-body">

                                            <form action="{{route('mpurchase.store')}}" class="row" method="POST">
                                            @csrf

                                                <div class="form-group">
                                                       <input type="hidden" class="form-control" id="date"  name="id"

                                                           placeholder="id">
                                                </div>
                                            <!--CODE-->
                                                <div class="form-group ">
                                                    <label for="code">كود الفاتورة</label>
                                                    <input type="text" class="form-control"
                                                           value="CUS000{{$max_mpurchases}}"
                                                           readonly
                                                           id="code" name="code" placeholder="Enter code" required>
                                                </div>
                                                <!--.CODE-->

                                                <div class="form-group">
                                                    <label for="date">التاريخ</label>
                                                    <input type="text" class="form-control" id="date"  name="date"

                                                           placeholder="التاريخ">
                                                </div>

                                                 <div class="form-group">
                                                    <label for="sup_id">المورد</label>

                                                     <select id="sup_id" name="sup_id" class="form-control">

                                                         <option value="0">@lang('siteAr.all_categories')</option>
                                                         @foreach ($suppliers as $sup)
                                                             <option value="{{ $sup->id }}" {{ old('sup_id')
                                             == $sup->id ? 'selected' : '' }}>{{ $sup->name }}
                                                             </option>
                                                         @endforeach

                                                     </select>

                                                </div>



                                                <div class="form-group">
                                                    <label for="inv_total">inv_total</label>
                                                    <input type="text" class="form-control" id="inv_total"  name="inv_total"

                                                           placeholder="inv_total">
                                                </div>

                                                <div class="form-group">
                                                    <label for="inv_disc">inv_disc</label>
                                                    <input type="text" class="form-control" id="inv_disc"  name="inv_disc"

                                                           placeholder="inv_disc">
                                                </div>

                                                <div class="form-group">
                                                    <label for="total">total</label>
                                                    <input type="text" class="form-control" id="total"  name="total"

                                                           placeholder="total">
                                                </div>

                                                <div class="form-group">
                                                    <label for="memo">memo</label>
                                                    <input type="text" class="form-control" id="total"  name="memo"

                                                           placeholder="memo">
                                                </div>


                                              <!--Deiteliles-->

                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table">
                                                                <input type="hidden" class="form-control" id="mpurchases_id"  name="mpurchases_id"
                                                                       placeholder="mpurchases_id">
                                                                <thead>
                                                                <tr>

                                                                    <th scope="col">product_id</th>
                                                                    <th scope="col">quantity</th>
                                                                    <th scope="col">prochePrice</th>
                                                                    <th scope="col">discount</th>
                                                                    <th>totalPrice</th>
                                                                    <th>action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody class="order-list">


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!--Deiteliles-->

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




        $(document).ready(function () {
            $('.add-product-btn').on('click',function (e) {



                e.preventDefault(); // not do refrache to page
                var id=$(this).data('id');
                var name=$(this).data('name');
                var imgpath=$(this).data("imgpath");


             //   alert(imgpath);

                $(this).removeClass('btn-success').addClass('btn-secondary disabled');





              var html='';
              html += '<tr>';

               html+='<td><input type="text" class="form-control" id="product_id" '+ 'value='+ id +' name="product_id[]"\n' +' placeholder="proid"></td> ';

             //  html+='<td><input type="text" class="form-control" id="name" '+ 'value='+ name +' name="name[]"\n' +' placeholder="name"></td> ';
                html+='<td> <input type="number" class="form-control" id="quantity"  name="quantity[]" placeholder="quantity" min="1" value="1"></td>';
                html+='<td><input type="text" class="form-control" id="prochePrice" name="prochePrice[]"placeholder="prochePrice"></td>';
                html+='<td><input type="text" class="form-control" id="discount"  name="discount[]" placeholder="discount"></td>';
                html+='<td> <input type="text" class="form-control" id="totalPrice"  name="totalPrice[]" placeholder="totalPrice"></td>';
                html+='<td><button class="btn btn-danger btn-sm remove-product-btn" data-id="'+ id +'"><span class="fa fa-trash"></span> </button> </td><tr/>'







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



    </script>

@endsection


