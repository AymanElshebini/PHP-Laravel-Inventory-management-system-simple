@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">

                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        شاشة تسجيل العملاء

                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-left: 12px">
                            <form action="{{route('customers.store')}}" class="row" method="POST">

                                @csrf




                                <!--CODE-->
                                    <div class="form-group col-md-6 col-md-6">
                                        <label for="code">رمز العميل</label>
                                        <input type="text" class="form-control"
                                               value="CUS000{{$max_customer}}"
                                               readonly
                                               id="code" name="code" placeholder="Enter code" required>
                                    </div>
                                <!--.CODE-->



                                <!--Name-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="name">أسم العميل</label>
                                    <input type="text" class="form-control" id="name"  name="name"
                                           placeholder="أدخل أسم العميل">
                                </div>
                                <!--./Name-->
                                <!--city-->
                                <div class="form-group col-md-12">



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
                                                <a href="{{route('cities.index')}}"  class="btn btn-primary">

                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>









                                </div>
                                <!--city-->
                                <!--phone1-->
                                <div class="form-group col-md-6">
                                    <label for="tel1">1رقم التليفون</label>
                                    <input type="text" class="form-control" id="tel1"  name="tel1"

                                           placeholder="أدخل رقم التليفون">
                                </div>
                                <!--phone1-->
                                <!-- phone2-->
                                <div class="form-group col-md-6">
                                    <label for="tel2">رقم التليفون</label>
                                    <input type="text" class="form-control" id="tel2"  name="tel2"

                                           placeholder="أدخل رقم التليفون">
                                </div>
                                <!-- phone2-->


                                    <!-- adress-->
                                    <div class="form-group col-md-12">
                                        <label for="address">العنوان تفصيلي</label>
                                        <textarea class="form-control"
                                                  placeholder="أدخل العنوان تفصيلي"
                                                  cols="42" rows="5"
                                                  maxlength="5000"
                                                  name="address" id="address">
                                         </textarea>
                                    </div>
                                    <!-- adress-->


                                <!-- momo-->
                                                               <div class="form-group col-md-12">
                                        <label for="memo"> ملاحظات العميل</label>
                                                                   <textarea class="form-control"
                                                                             placeholder="أدخل الملاحظات"
                                                                             cols="42" rows="5"
                                                                             maxlength="5000"
                                                                             name="memo" id="memo">
                                                                              </textarea>
                                    </div>
                                    <!-- momo-->








                                <div class="form-group col-md-6 col-md-12 text-center buttons-container">
                                    <button type="submit" class="btn btn-primary">
                                        حفـظ
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                        </button>
                                    <a href="{{route('customers.index')}}"  class="btn btn-primary">
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
