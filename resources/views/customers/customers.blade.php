@extends('layouts.app')

@section('content')

    <div class="main_body">
        <div class="container-fluid">

            <div class="card mainpage">
                <div class="card-header">

                    <a href="{{ route('home') }}" class="fa fa-close iconsclose"></a>


                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                    شاشة جميع العملاء

                </div>




                <div class="toolBar">

                    <div class="toolBar-action">
                        <a href="{{route('customers.create')}}"  class="btn btn-success" >
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

                        <!--ToolBaer-->

                        <div class="container-fluid">



                        </div>





                        <!--ToolBaer-->
                        <!--=======View Units======-->

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">

                                        <!--==============Items===================================-->
                                        <div class="col-md-12" style="overflow: hidden">


                                            @if($customers->count()>0)
                                                <table class="table table-striped table-bordered mydatatable" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>أسم العميل</th>
                                                        <th>أكشن</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>




                                                    @foreach($customers as $index=>$mycust)
                                                        <tr>

                                                            <td>{{$index+1}}</td>
                                                            <td>{{$mycust->name}}</td>



                                                            <td>

                                                                <!--btn-Edit-->
                                                                <a href="{{route('customers.edit',$mycust->id)}}"
                                                                   class="btn btn-success btn-outline btn-sm m-l-xs
                                                                    pj-table-icon-edit space">
                                                                    تعديل
                                                                    <i class="fa fa-pencil"></i>

                                                                </a>
                                                                <!--./btn-Edit-->

                                                                <!--btn-Delete-->
                                                                <form action="{{route('customers.destroy',$mycust->id)}}" method="post" style="display: inline-block" >
                                                                    {{csrf_field()}}
                                                                    {{method_field('delete')}}

                                                                    <button type="submit"  class="btn btn-danger delete btn-sm">
                                                                        حـــذف
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>


                                                                </form>
                                                                <!--./btn-Delete-->

                                                                <!--btn-show-model-->
                                                                <!--show-->

                                                                <a href="#" class="show-modal btn btn-primary btn-sm"
                                                                   data-id="{{$mycust->id}}"
                                                                   data-name="{{$mycust->name}}">


                                                                    <i class="fa fa-eye"></i>
                                                                </a>

                                                                <!--show-->
                                                                <!--./btn-show-model-->
                                                            </td>

                                                        </tr>
                                                    @endforeach


                                                    </tbody>
                                                </table>
                                                {{$customers->appends(request()->query())->links() }}
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





                    <!--view model show customers-->
                    <div id="show" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="">أسم العميل :</label>
                                        <b id="cust_name"/>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">رجوع</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--view model-->


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

