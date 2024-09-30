@extends('layouts.app')

@section('content')

    <div class="main_body">
        <div class="container-fluid">

            <div class="card mainpage">
                <div class="card-header">

                    <a href="http://localhost/mysite/Laravel/SoloGreenProject/Inventory/Inventory/public/dashboard" class="fa fa-close iconsclose"></a>


                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                    شاشة المنتجات

                </div>




                <div class="toolBar">

                    <div class="toolBar-action">
                        <a href="{{route('products.create')}}"  class="btn btn-success" >
                            أضافة
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                        <a href="" class="btn btn-success">
                            تحديث
                            <i class="fa fa-refresh" aria-hidden="true">

                            </i>

                        </a>

                    </div>

                    <div class="toolBar-search">
                        <form action="{{ route('customers.index') }}" method="get">



                            <div class="input-group mb-3">
                                <input type="text" class="form-control"  name="search" autocomplete="on"
                                       value="{{ request()->search }}"
                                       placeholder="أدخل البحثُ"
                                       aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">

                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn btn-success"


                                            type="submit">  بحث <i class="fa fa-search"></i></button>
                                </div>
                            </div>


                        </form>

                    </div>









                </div>



                <div class="card-body">

                    <div class="row wow flash" style="visibility: visible; animation-name: flash;">


                        <div class="container-fluid">

                            <div class="row wow flash" style="visibility: visible; animation-name: flash;">


                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="row">

                                                <!--==============Items===================================-->
                                                <div class="col-md-12" style="overflow: hidden">


                                                    @if($products ->count()>0)
                                                        <table class="table table-striped table-bordered mydatatable" style="width: 100%">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>المنتج</th>
                                                                <th>صورة</th>
                                                                <th>#</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @foreach($products as $index=>$product)
                                                                <tr>

                                                                    <td>{{$index+1}}</td>
                                                                    <td>{{$product->name}}</td>


                                                                    <td>

                                                                        <img src="{{$product->imgpath}}"
                                                                             alt="{{$product->name}}"

                                                                             class="img-thumbnail images" style="width: 50px; height: 50px">
                                                                    </td>


                                                                    <td>



                                                                        <a href="{{route('products.edit',$product->id)}}"
                                                                           class="btn btn-primary btn-outline btn-sm m-l-xs pj-table-icon-edit space">
                                                                            <i class="fa fa-pencil"></i>

                                                                        </a>

                                                                        <form action="{{route('products.destroy',$product->id)}}" method="post" style="display: inline-block" >
                                                                            {{csrf_field()}}
                                                                            {{method_field('delete')}}

                                                                            <button type="submit"  class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> </button>


                                                                        </form>




                                                                    </td>

                                                                </tr>






                                                            @endforeach


                                                            </tbody>
                                                        </table>

                                                        {{$products->appends(request()->query())->links() }}
                                                    @else
                                                        <h2>@lang('siteAr.no_data_found')</h2>
                                                    @endif
                                                </div>
                                                <!--==============./Items===================================-->

                                            </div>
                                        </div>





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
        // Show function
        $(document).on('click', '.show-modal', function() {
            $('#show').modal('show');

            $('#cust_name').text($(this).data('name'));


        });
    </script>



@endsection

