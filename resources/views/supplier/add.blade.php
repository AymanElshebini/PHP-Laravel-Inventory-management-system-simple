@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">

                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        اشاشة تسجيل الموردين

                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-left: 12px">
                            <form action="{{route('suppliers.store')}}" class="row" method="POST">

                            @csrf




                            <!--CODE-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="code">رمز المورد</label>
                                    <input type="text" class="form-control"
                                           value="SUP000{{$max_suppliers}}"
                                           readonly
                                           id="code" name="code" placeholder="Enter code" required>
                                </div>
                                <!--.CODE-->

                                <!--company Name-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="namecompany">أسم  الشركة</label>
                                    <input type="text" class="form-control" id="namecompany"  name="namecompany"
                                           placeholder="أدخل أسم الشركة">
                                </div>
                                <!--./company Name-->

                                <!--Name-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="name">أسم  المورد</label>
                                    <input type="text" class="form-control" id="name"  name="name"
                                           placeholder="أدخل أسم المورد">
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
                                            <a href="{{route('cities.index')}}"  class="btn btn-primary">

                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>









                                </div>
                                <!--city-->
                                <!--tel1-->
                                <div class="form-group col-md-6">
                                    <label for="tel1">رقم التليفون</label>
                                    <input type="text" class="form-control" id="tel1"  name="tel1"

                                           placeholder="أدخل رقم التليفون">
                                </div>
                                <!--tel1-->
                                <!-- phone2-->
                                <div class="form-group col-md-6">
                                    <label for="tel2">رقم التليفون</label>
                                    <input type="text" class="form-control" id="tel2"  name="tel2"

                                           placeholder="أدخل رقم التليفون">
                                </div>
                                <!-- phone2-->




                                <!-- address-->
                                <div class="form-group col-md-12">
                                    <label for="address"> العنوان </label>
                                    <textarea class="form-control"
                                              placeholder="أدخل  العنوان"
                                              cols="42" rows="10"
                                              maxlength="5000"
                                              name="address" id="address">
                                    </textarea>
                                </div>
                                <!-- address-->


                                <!-- momo-->
                                <div class="form-group col-md-12">
                                    <label for="memo"> ملاحظات العميل</label>
                                    <textarea class="form-control"
                                              placeholder="أدخل الملاحظات"
                                              cols="42" rows="10"
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
                                    <a href="{{route('suppliers.index')}}"  class="btn btn-primary">
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
