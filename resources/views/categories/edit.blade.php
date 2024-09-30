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
                @lang('SiteAr.brand')
                <!--./Screen-->
                </div>





                <div class="card-body">
                    <div class="row wow flash" style="visibility: visible; animation-name: flash;">


                        <!--=======edit Units======-->
                        <div class="container">

                            <div class="row">
                                <!--Insert catogery-->
                                <div class="col-12">
                                    @include('partials._errors')

                                    <form action="{{route('categories.update',$category->id)}}"
                                          method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('put')}}

                                    <!--Nmae catogery-->
                                        <div class="form-group">
                                            <label for="name">@lang('siteAr.name_cat')</label>
                                            <input type="text" class="form-control" id="name"  name="name"
                                                   value="{{$category->name}}"
                                                   placeholder="@lang('siteAr.enter_name_cat')">
                                        </div>
                                        <!--./Nmae catogery-->




                                        <div class="form-group">
                                            <div class="col-auto">

                                                <label class="cols-sm-2 control-label"> @lang('siteAr.image_cat') </label>
                                                <div class="input-group mb-2">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="imgpath"
                                                               id="imgpath" onchange="return ValidateFileUpload()"  >
                                                        <label class="custom-file-label" > .....@lang('siteAr.enter_image_cat')</label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <div style=" text-align: -webkit-center;">
                                                <div class="iamge_control">


                                                    <img src="{{$category->imgpath}}" id="blah" >


                                                </div>
                                            </div>
                                        </div>





                                        <div class="col-md-12 text-center buttons-container">
                                            <button type="submit" class="btn btn-primary">@lang('siteAr.edit')</button>
                                            <a href="{{route('categories.index')}}"
                                               class="btn btn-primary">@lang('siteAr.back')</a>

                                        </div>



                                    </form>


                                </div>

                                <!--./Insert catogery-->
                            </div>
                        </div>

                    </div>
                    <!--=======./Edit Units======-->




                </div>
            </div>

        </div>






    </div>







@endsection







