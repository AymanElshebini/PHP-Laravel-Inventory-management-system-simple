<!--NavBAR-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">


    <a class="navbar-brand" href="#">
        <img src="img/logo.jpg" alt="Solo Green" class="img-logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#"
                   id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-home mune-link "></i>


                   البيانات الاساسية

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('units.index')}}">الوحدات القياسية</a>
                    <a class="dropdown-item" href="{{route('cities.index')}}"> المحافظات</a>
                    <a class="dropdown-item" href="{{route('zones.index')}}"> الفروع</a>
                     <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('customers')}}">تعريف العملاء</a>
                    <a class="dropdown-item" href="{{url('suppliers')}}">تعريف الموردين</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('categories')}}">تسجيل المجموعات</a>
                    <a class="dropdown-item" href="{{url('products')}}">أدخال  الاصناف</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('users')}}">مستخدمي النظام</a>

                </div>
            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-home mune-link "></i>


                    حركات المخزن

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('mpurchase.index')}}">أصدار فاتورة شراء</a>
                    <a class="dropdown-item" href="{{route('masterpos.index')}}">أصدار فاتورة بيع</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-home mune-link "></i>


                    البيانات الاساسية

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-home mune-link "></i>


                    البيانات الاساسية

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-home mune-link "></i>


                    البيانات الاساسية

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

        </ul>

    </div>


</nav>
<!--./NavBAR-->
