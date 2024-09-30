@extends('layouts.dashboard.admin')

@section('content')

    <div class="main_body">
        <div class="container-fluid">

            <div class="card mainpage">
                <div class="card-header">
<!--Screen-->
                    <a href="{{ route('dashboard') }}"
                       class="fa fa-close iconsclose">

                    </a>


                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                    @lang('SiteAr.units')
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

                                    <form id="myform" name="myform"
                                          class="form-horizontal"
                                          action="{{route('units.update',$unit->id)}}" method="POST">

                                        {{csrf_field()}}
                                        {{method_field('put')}}
                                        <div class="form-group">
                                            <div class="col-auto">

                                                <label for="name" class="cols-sm-2 control-label">  @lang('SiteAr.unit_name') </label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-folder-o"
                                                                                         aria-hidden="true"></i></div>
                                                    </div>
                                                    <input type="text" name="name" id="name"
                                                           class="form-control" placeholder="@lang('SiteAr.p_unit_name')"
                                                           value="{{$unit->name}}"
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
                        <!--=======./Edit Units======-->




                </div>
            </div>

        </div>






    </div>







@endsection







