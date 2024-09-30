@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">

                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        شاشة تسجيل الاصناف

                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-left: 12px">
                            <form action="{{route('products.store')}}" class="row" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('post')}}




                                <!--CODE-->
                                    <div class="form-group col-md-3 col-md-3">
                                        <label for="code">كود الصنف</label>
                                        <input type="text" class="form-control"
                                               value="000{{$max_products}}"
                                             id="code" name="code"
                                               placeholder="Enter code" required>
                                    </div>
                                <!--.CODE-->

                                <!--category_id-->
                                <div class="form-group col-md-3 col-md-3">
                                    <label for="category_id"> التصنيف </label>
                                    <select id="category_id" name="category_id" class="form-control">

                                        <option value="0">@lang('siteAr.all_categories')</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id')
                                             == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                                <!--./category_id-->

                                <!--Name-->
                                <div class="form-group col-md-9 col-md-9">
                                    <label for="name">أسم الصنف</label>
                                    <input type="text" class="form-control"
                                           id="name"  name="name"
                                           placeholder="أدخل أسم  الصنف">
                                </div>
                                <!--./Name-->

                                <!--Unit-->
                                <div class="form-group col-md-3 col-md-3">
                                    <label for="unit_id"> الوحدات </label>
                                    <select id="unit_id" name="unit_id" class="form-control">

                                        <option value="0">@lang('siteAr.all_categories')</option>
                                        @foreach ($units as $unit)
                                            <option value="{{$unit->id }}" {{ old('unit_id')
                                             == $unit->id ? 'selected' : '' }}>{{ $unit->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                                <!--./Unit-->

                             <!--zone id-->
                                <div class="form-group col-md-3 col-md-3">
                                    <label for="zone_id"> فروع المخزن </label>
                                    <select id="zone_id" name="zone_id" class="form-control">

                                        <option value="0">@lang('siteAr.all_categories')</option>
                                        @foreach ($zones as $zone)
                                            <option value="{{$zone->id }}" {{ old('zone_id')
                                             == $zone->id ? 'selected' : '' }}>{{ $zone->name }}
                                            </option>
                                        @endforeach

                                    </select>

                                </div>
                                <!--./zone id-->

                                <!--zone qty-->
                                <div class="form-group col-md-4 col-md-4">
                                    <label for="zone_qty">الكمية المخزن</label>
                                    <input type="text" class="form-control"
                                           id="zone_qty"  name="zone_qty"
                                           placeholder="أدخل الكمية في المخزن">
                                </div>
                                <!--./zone qty-->

                                <!--size-->
                                    <div class="form-group col-md-4 col-md-4">
                                        <label for="size">المقاس</label>
                                        <input type="text" class="form-control"
                                               id="size"  name="size"
                                               placeholder="أدخل المقاس">
                                    </div>
                                <!--./size-->

                                <!--color-->
                                <div class="form-group col-md-3 col-md-3">
                                    <label for="color"> اللون </label>
                                    <input type="text" class="form-control"
                                           id="color"  name="color"
                                           placeholder="الالوان">

                                </div>
                                <!--./color-->


                                <!--selling_price-->
                                <div class="form-group col-md-3">
                                    <label for="sellprice">سعر البيع</label>
                                    <input type="text" class="form-control"
                                           id="sellprice"  name="sellprice"
                                           placeholder="أدخل سعر البيع"/>
                                </div>
                                <!--./selling_price-->

                                <!--regular_price-->
                                <div class="form-group col-md-3">
                                    <label for="purchaseprice">سعر الشراء</label>
                                    <input type="text" class="form-control" id="purchaseprice"
                                           name="purchaseprice"
                                           placeholder="أدخل  سعر الشراء">

                                </div>
                                <!--./regular_price-->






                                <!-- Order_limit-->
                                <div class="form-group col-md-3">
                                    <label for="orderlimit">إعادة حد الطلب</label>
                                    <input type="text" class="form-control"
                                           id="orderlimit"
                                           name="orderlimit"
                                           placeholder="إعادة حد الطلب">

                                </div>
                                <!-- ./Order_limit-->





                         <!--fullDesc-->

                                <!-- momo-->
                                <div class="form-group col-md-12">
                                    <label for="fullDesc"> وصف المنتج</label>
                                    <textarea class="form-control"
                                              placeholder="أدخال وصف للمنتج"
                                              cols="42" rows="10"
                                              maxlength="5000"
                                              name="fullDesc" id="fullDesc">
                                     </textarea>
                                </div>
                                <!-- momo-->

                                <!--fullDesc-->



                                <!-- images-->
                                 <div class="form-group col-md-6">

                                     <label class="cols-sm-2 control-label"> صورة المنتج </label>
                                     <div class="input-group mb-2">
                                         <div class="custom-file">
                                             <input type="file" class="custom-file-input" name="imgpath"
                                                    id="imgpath" onchange="return ValidateFileUpload()"  >
                                             <label class="custom-file-label" > .....choose Image</label>

                                         </div>
                                     </div>

                                    </div>
                                    <!-- images-->








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
