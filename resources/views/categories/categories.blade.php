@extends('layouts.app')


@section('content')
    <div class="main_body">
        <div class="container-fluid">

            <div class="card mainpage">
                <div class="card-header">
                    <!--Screen-->
                    <a href="{{ route('home') }}"
                       class="fa fa-close iconsclose">

                    </a>


                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                @lang('SiteAr.category')
                <!--./Screen-->
                </div>


                <!--toolBar-->

                <div class="toolBar">

                    <div class="toolBar-action">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">

                            @lang('SiteAr.create')
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <form action="{{ route('categories.index') }}" method="get"  style="display: inline-block">
                            <button  class="btn btn-success">
                                @lang('SiteAr.refresh')
                                <i class="fa fa-refresh" aria-hidden="true">

                                </i>

                            </button>
                        </form>

                    </div>

                    <div class="toolBar-search">
                        <form action="{{ route('categories.index') }}" method="get">
                            @csrf


                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search"
                                       value="{{request()->search}}"

                                       placeholder="@lang('SiteAr.p_search')ُ" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">

                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn btn-success" type="submit">
                                        @lang('SiteAr.search')


                                        <i class="fa fa-search"></i></button>
                                </div>
                            </div>


                        </form>

                    </div>









                </div>
                <!--./toolBar-->


                <div class="card-body">
                    <div class="row wow flash" style="visibility: visible; animation-name: flash;">


                        <!--=======View Units======-->

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">

                                        <!--==============Items===================================-->
                                        <div class="col-md-12" style="overflow: hidden">


                                            @if($categories->count()>0)
                                                <table class="table table-striped table-bordered mydatatable" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>القسم</th>
                                                        <th>صورة</th>
                                                        <th>#</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($categories as $index=>$category)
                                                        <tr>

                                                            <td>{{$index+1}}</td>
                                                            <td>{{$category->name}}</td>


                                                            <td>

                                                                <img src="{{$category->imgpath}}"
                                                                     alt="{{$category->name}}"

                                                                     class="img-thumbnail images" style="width: 50px; height: 50px">
                                                            </td>


                                                            <td>



                                                                <a href="{{route('categories.edit',$category->id)}}"
                                                                   class="btn btn-primary btn-outline btn-sm m-l-xs pj-table-icon-edit space">
                                                                    <i class="fa fa-pencil"></i>

                                                                </a>

                                                                <form action="{{route('categories.destroy',$category->id)}}" method="post" style="display: inline-block" >
                                                                    {{csrf_field()}}
                                                                    {{method_field('delete')}}

                                                                    <button type="submit"  class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> </button>


                                                                </form>




                                                            </td>

                                                        </tr>






                                                    @endforeach


                                                    </tbody>
                                                </table>

                                                {{$categories->appends(request()->query())->links() }}
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
                    <!--=======./View Units======-->




                </div>
            </div>

        </div>





        {{-- Modal Form Add New  Units--}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> أضافة وحدة جديدة </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="container">

                            <div class="row">
                                <!--Insert catogery-->
                                <div class="col-12">
                                    @include('partials._errors')

                                    <form id="myform" name="myform" enctype="multipart/form-data"
                                          class="form-horizontal"
                                          action="{{route('categories.store')}}" method="POST">

                                        {{csrf_field()}}
                                        {{method_field('post')}}
                                        <div class="form-group">
                                            <div class="col-auto">

                                                <label for="name" class="cols-sm-2 control-label">@lang('siteAr.name_cat') </label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-folder-o" aria-hidden="true"></i></div>
                                                    </div>
                                                    <input type="text" name="name" id="name"
                                                           class="form-control" placeholder="@lang('siteAr.enter_name_cat')"
                                                           maxlength="60" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-auto">

                                                <label class="cols-sm-2 control-label"> صورة </label>
                                                <div class="input-group mb-2">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="imgpath"
                                                               id="imgpath" onchange="return ValidateFileUpload()"  >
                                                        <label class="custom-file-label" > ..... @lang('siteAr.enter_image_cat') </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <div style=" text-align: -webkit-center;">
                                                <div class="iamge_control">
                                                    <img src="{{asset('img/noimage.png')}}" id="blah">


                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">

                                            <div class="form-group col-md-6 col-md-12 text-center buttons-container">
                                                <button type="submit" class="btn btn-primary">
                                                    حفـظ
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </button>
                                                <a href="" class="btn btn-primary">
                                                    الغاء
                                                    <i class="fa fa-undo" aria-hidden="true" data-dismiss="modal"></i>
                                                </a>

                                            </div>



                                        </div>
                                    </form>

                                </div>

                                <!--./Insert catogery-->
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        {{--./Modal Form Add New  Units--}}
    </div>







@endsection







