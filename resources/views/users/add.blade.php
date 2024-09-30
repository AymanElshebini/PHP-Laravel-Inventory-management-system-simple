@extends('layouts.dashboard.admin')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">

                        <i class="fa fa-bookmark" aria-hidden="true"></i>
                        شاشة تسجيل مستخدم

                    </div>

                    <div class="card-body">
                        <div class="row" style="margin-left: 12px">
                            <form action="{{route('users.store')}}" class="row" method="POST">

                            @csrf







                                <!--Name-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="name">أسم المستخدم</label>
                                    <input type="text" class="form-control" id="name"  name="name"
                                           placeholder="أدخل أسم العميل">
                                </div>
                                <!--./Name-->
                                <!--email-->
                                <div class="form-group col-md-6">
                                    <label for="email">البريد الالكتروني</label>
                                    <input type="text" class="form-control" id="email"  name="email"
                                           placeholder="أدخل البريد الالكتروني"/>
                                </div>
                                <!--email-->

                                <!--password-->
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="password">كلمة المرور</label>
                                    <input type="text" class="form-control"
                                           id="password"  name="password"
                                           placeholder="أدخل كلمة المرور">
                                </div>
                                <!--./password-->

                                <!--phone1-->
                                <div class="form-group col-md-6">
                                    <label for="phone">رقم التليفون</label>
                                    <input type="text" class="form-control" id="phone"  name="phone"

                                           placeholder="أدخل رقم التليفون">
                                </div>
                                <!--phone1-->


                                <!--type-->
                                <div class="form-group col-md-6">
                                    <label for="name">نوع المستخدم</label>
                                    <select id="type" name="type" class="form-control">

                                        <option value="1" selected > مدير </option>
                                        <option value="2" selected > بائع </option>
                                        <option value="3" selected > مشتريات </option>


                                    </select>

                                </div>
                                <!--type-->


                                <!--isactive-->
                                <div class="form-group col-md-6">
                                    <label for="name">حالة المستخدم</label>
                                    <select id="status" name="status" class="form-control">

                                        <option value="1" selected > نشط </option>
                                        <option value="0" > محظور </option>

                                    </select>

                                </div>
                                <!--isactive-->

                                <!-- momo-->
                                <div class="form-group col-md-12">
                                    <label for="momo"> ملاحظات </label>
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
                                    <a href="{{url('users')}}"  class="btn btn-primary">
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