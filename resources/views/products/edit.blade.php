@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">

                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                      @lang('SiteAr.cust_screen_Edit')
                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-left: 12px">
                            <form action="{{route('customers.update',$customer->id)}}" class="row" method="POST">

                            @csrf




                            <!--CODE-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="code">رمز العميل</label>
                                    <input type="text" class="form-control"
                                               value="{{$customer->code}}"
                                           readonly
                                           id="code" name="code" placeholder="Enter code" required>
                                </div>
                                <!--.CODE-->


                                <!--pymentkind-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="pymentkind">طريقة الدفع </label>
                                    <select id="pymentkind" name="pymentkind" class="form-control">

                                        <option value="1" selected > نقدي</option>
                                        <option value="2" >  أجل </option>
                                        <option value="3" >  نقدي وأجل </option>

                                    </select>

                                </div>
                                <!--pymentkind-->
                                <!--Name-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="name">أسم العميل</label>
                                    <input type="text" class="form-control" id="name"  name="name"
                                           value="{{$customer->name}}"
                                           placeholder="أدخل أسم العميل">
                                </div>
                                <!--./Name-->
                                <!--city-->
                                <div class="form-group col-md-6">



                                    <label for="city_id">المحافظة



                                    </label>
                                    <div class="input-group mb-6">

                                        <!--select-->
                                        <select name="city_id" class="form-control">
                                            <option value="0">@lang('siteAr.all_city')</option>
                                            @foreach ($city as $mycity)
                                                <option value="{{$mycity->id }}" {{ old('city_id')
                                                == $mycity->id ? 'selected' : '' }}>{{ $mycity->name }}</option>
                                            @endforeach
                                        </select>
                                        <!--select-->
                                        <div class="input-group-append">
                                            <a href="{{route('cities')}}"  class="btn btn-primary">

                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>









                                </div>
                                <!--city-->
                                <!--phone1-->
                                <div class="form-group col-md-6">
                                    <label for="phone1">رقم التليفون</label>
                                    <input type="text" class="form-control" id="phone1"  name="phone1"

                                           placeholder="أدخل رقم التليفون">
                                </div>
                                <!--phone1-->
                                <!-- phone2-->
                                <div class="form-group col-md-6">
                                    <label for="phone2">رقم التليفون</label>
                                    <input type="text" class="form-control" id="phone2"  name="phone2"

                                           placeholder="أدخل رقم التليفون">
                                </div>
                                <!-- phone2-->
                                <!--phone3-->
                                <div class="form-group col-md-6">
                                    <label for="phone3">رقم التليفون</label>
                                    <input type="text" class="form-control" id="phone3"  name="phone3"
                                           placeholder="أدخل رقم التليفون">

                                </div>
                                <!--phone3-->
                                <!--email-->
                                <div class="form-group col-md-6">
                                    <label for="email">البريد الالكتروني</label>
                                    <input type="text" class="form-control" id="email"  name="email"
                                           placeholder="أدخل البريد الالكتروني"/>
                                </div>
                                <!--email-->
                                <!--evaluation-->
                                <div class="form-group col-md-6">
                                    <label for="evaluation">تقيم العميل</label>
                                    <select id="evaluation" name="evaluation" class="form-control">

                                        <option value="1" selected > جيد</option>
                                        <option value="2" > غير جيد </option>

                                    </select>

                                </div>
                                <!--evaluation-->
                                <!--status-->
                                <div class="form-group col-md-6">
                                    <label for="status"> الحالة</label>
                                    <select id="status" name="status" class="form-control">

                                        <option value="1" selected > نشط</option>
                                        <option value="2" > محظور </option>

                                    </select>

                                </div>
                                <!--./status-->
                                <!-- momo-->
                                <div class="form-group col-md-12">
                                    <label for="momo"> ملاحظات العميل</label>
                                    <textarea class="form-control"
                                              placeholder="أدخل الملاحظات"
                                              cols="42" rows="10"
                                              maxlength="5000"
                                              name="momo" id="momo">
                                                                              </textarea>
                                </div>
                                <!-- momo-->








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


                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>





@endsection