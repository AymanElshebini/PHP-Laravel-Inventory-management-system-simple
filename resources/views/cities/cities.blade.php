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
                    @lang('SiteAr.cities')
   <!--./Screen-->
                </div>


                <!--toolBar-->

                <div class="toolBar">

                    <div class="toolBar-action">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">

                            @lang('SiteAr.create')
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <form action="{{ route('cities.index') }}" method="get"  style="display: inline-block">
                        <button  class="btn btn-success">
                            @lang('SiteAr.refresh')
                            <i class="fa fa-refresh" aria-hidden="true">

                            </i>

                        </button>
                        </form>

                    </div>

                    <div class="toolBar-search">
                        <form action="{{ route('cities.index') }}" method="get">
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

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">

                                        <!--==============Items===================================-->
                                        <div class="col-md-12" style="overflow: hidden">

                                           @if($cities->count()>0)
                                                <table class="table table-striped table-bordered mydatatable" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('siteAr.city')</th>
                                                        <th>@lang('siteAr.acation')</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($cities as $index=>$city)
                                                        <tr>

                                                            <td>{{$index+1}}</td>
                                                            <td>{{$city->name}}</td>



                                                            <td>


                                                                <a href="{{route('cities.edit',$city->id)}}"
                                                                   class="btn btn-success btn-outline btn-sm m-l-xs
                                                                    pj-table-icon-edit spac ">

                                                                    <i class="fa fa-pencil"></i>

                                                                </a>


                                                                <!--btn Delete-->

                                                                      <form action="{{route('cities.destroy',$city->id)}}"
                                                                            method="post" style="display: inline-block">
                                                                          {{csrf_field()}}
                                                                          {{method_field('delete')}}

                                                                          <button type="submit" class="btn btn-danger btn-sm ">
                                                                               <i class="fa fa-trash-o" aria-hidden="true" ></i>
                                                                          </button>
                                                                      </form>





                                                                <!--./btn Delete-->




                                                            </td>

                                                        </tr>


                                                    @endforeach


                                                    </tbody>
                                                </table>

                                                {{$cities->appends(request()->query())->links() }}
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
                        <h5 class="modal-title" id="exampleModalLabel"> @lang('siteAr.add_city') </h5>
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

                                    <form id="myform" name="myform"
                                          class="form-horizontal"
                                          action="{{route('cities.store')}}" method="POST">

                                        {{csrf_field()}}
                                        {{method_field('post')}}
                                        <div class="form-group">
                                            <div class="col-auto">

                                                <label for="name" class="cols-sm-2 control-label">
                                                    @lang('SiteAr.brand_name')</label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-folder-o"
                                                                                         aria-hidden="true"></i></div>
                                                    </div>
                                                    <input type="text" name="name" id="name"
                                                           class="form-control"
                                                           placeholder="@lang('SiteAr.p_city_name')"
                                                           maxlength="60" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="modal-footer">

                                            <div class="form-group col-md-6 col-md-12 text-center buttons-container">
                                                <button type="submit" class="btn btn-primary">
                                                    @lang('SiteAr.save')
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </button>
                                                <a href="{{route('cities.index')}}" class="btn btn-primary">
                                                    @lang('SiteAr.back')
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







