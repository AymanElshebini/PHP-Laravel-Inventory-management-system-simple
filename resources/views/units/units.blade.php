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
                    @lang('SiteAr.units')
   <!--./Screen-->
                </div>


                <!--toolBar-->

                <div class="toolBar">

                    <div class="toolBar-action">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">

                            @lang('SiteAr.create')
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <form action="{{ route('units.index') }}" method="get"  style="display: inline-block">
                        <button  class="btn btn-success">
                            @lang('SiteAr.refresh')
                            <i class="fa fa-refresh" aria-hidden="true">

                            </i>

                        </button>
                        </form>

                    </div>

                    <div class="toolBar-search">
                        <form action="{{ route('units.index') }}" method="get">
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


                                            @if($units->count()>0)
                                                <table class="table table-striped table-bordered mydatatable" style="width: 100%">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('siteAr.unit')</th>
                                                        <th>@lang('siteAr.acation')</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($units as $index=>$unit)
                                                        <tr>

                                                            <td>{{$index+1}}</td>
                                                            <td>{{$unit->name}}</td>



                                                            <td>


                                                                <a href="{{route('units.edit',$unit->id)}}"
                                                                   class="btn btn-success btn-outline btn-sm m-l-xs
                                                                    pj-table-icon-edit spac ">

                                                                    <i class="fa fa-pencil"></i>

                                                                </a>


                                                                <!--btn Delete-->

                                                                      <form action="{{route('units.destroy',$unit->id)}}"
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

                                                {{$units->appends(request()->query())->links() }}
                                            @else
                                                <h2>@lang('siteAr.no_data_found_unit')</h2>
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
                        <h5 class="modal-title" id="exampleModalLabel"> @lang('siteAr.add_unit') </h5>
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
                                          action="{{route('units.store')}}" method="POST">

                                        {{csrf_field()}}
                                        {{method_field('post')}}

                                        <!--Unit Name -->
                                            <div class="form-group">
                                                <div class="col-auto">

                                                    <label for="name" class="cols-sm-2 control-label">   @lang('SiteAr.unit_name')</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="fa fa-folder-o"
                                                                                             aria-hidden="true"></i></div>
                                                        </div>
                                                        <input type="text" name="name" id="name"
                                                               class="form-control" placeholder="@lang('SiteAr.p_unit_name')"
                                                               maxlength="60" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Unit Name -->

                                            <!--Unit unit_convert -->
                                            <div class="form-group">
                                                <div class="col-auto">

                                                    <label for="unit_convert" class="cols-sm-2 control-label">   @lang('SiteAr.unit_convert')</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text"><i class="fa fa-folder-o"
                                                                                             aria-hidden="true"></i></div>
                                                        </div>
                                                        <input type="text" name="unit_convert" id="unit_convert"
                                                               class="form-control" placeholder="@lang('SiteAr.P_unit_convert')"
                                                               maxlength="60" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Unit unit_convert -->

                                        <div class="modal-footer">

                                            <div class="form-group col-md-6 col-md-12 text-center buttons-container">
                                                <button type="submit" class="btn btn-primary">
                                                    @lang('SiteAr.save')
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </button>
                                                <a href="{{route('units.index')}}" class="btn btn-primary">
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







