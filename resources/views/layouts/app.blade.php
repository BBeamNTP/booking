<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('asset/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('asset/css/app.css') }}" rel="stylesheet">

    {{--    boostrap--}}
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>--}}
    {{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}

    <link href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js')}}"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js')}}"
            integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
            crossorigin="anonymous"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js')}}"
            integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js')}}"></script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                {{ config('app.name', 'Home') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown"  onclick="window.location.href='{{url('/view_cart')}}'">

                            <a class="nav-link" >
                                <span id="cart"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                     class="bi bi-cart3" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>

                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="modal" data-toggle="modal" data-target="#myModal" class="nav-link">
                                เพิ่มสินค้า
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

<div class="container">
    <div class="container">
        <!-- Button to Open the Modal -->


        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มสินค้า</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="container">
                        <form id="Create_product" class="needs-validation" enctype="multipart/form-data" novalidate>
{{--                                                    <form id="Create_product" action="{{url('/store/product')}}" method="POST"--}}
{{--                            class="needs-validation" enctype="multipart/form-data" novalidate>--}}
                            @csrf
                            <p>ภาพสินค้า :</p>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="filename">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                            <div class="form-group">
                                <label for="product_name">ชื่อสินค้า :</label>
                                <input type="text" class="form-control" id="product_name" placeholder="ชื่อสินค้า"
                                       name="product_name" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="form-group">
                                <label for="price">ราคา :</label>
                                <input type="text" class="form-control col-10" id="price" placeholder="ราคา"
                                       name="price" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="row" id="color">
                                <hr style="width: 95%; margin-left: 10px">
                                <div class="form-group col-9">
                                    <label for="pwd">สี :</label>
                                    <div class="container row form-inline" id="div_color">
                                        <div class="mb-1"><a>1 : <input type="text"
                                                                        class="form-control" style="width: 95%"
                                                                        id="color1"
                                                                        placeholder="สี"
                                                                        name="color[]" required></a></div>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>

                                </div>
                                <div class="form-group col-3" align="right">
                                    <br>
                                    <div class="container " id="div_color" onclick="add_color()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
                                            <path fill-rule="evenodd"
                                                  d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                        เพิ่มสี
                                    </div>

                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>

                                <div class="form-group col-9">
                                    <label for="pwd">ขนาด :</label>
                                    <div class="container row form-inline" id="div_size">
                                        <div class="mb-1">
                                            <a>1 : <input type="text" class="form-control" style="width: 95%"
                                                          id="size1" placeholder="ขนาด" name="size[]" required>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group col-3" align="right">
                                    <br>
                                    <div class="container " id="div_color" onclick="add_size()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
                                            <path fill-rule="evenodd"
                                                  d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                        เพิ่มไซต์
                                    </div>

                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>

                            <div align="right">
                                <button type="button" class="btn btn-primary created_btn"
                                        onclick="create_data()">
                                    สร้าง
                                </button>
                            </div>

                            <br><br>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>
<script>
    $(document).ready(function () {
            $.ajax({
                url: "{{url('/get_cart')}}",
                methods: "GET",
                success: function (res) {
                    console.log(res)
                        $('#cart').html(res.output);
                }
            });
    });
</script>
<script>
    // Disable form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    var loopcolor = 2;

    function add_color() {
        var a = '';

        a += '<div class="mb-1"><a>'+loopcolor+' : <input type="text" class="form-control" style="width: 95%" id="color1" placeholder="สี" name="color[]" required></a></div>'
        $('#div_color').append(a)
        loopcolor = loopcolor + 1;
    }
</script>
<script>
    var loopsize = 2;

    function add_size() {
        var a = '';

        a += '<div class="mb-1"><a>'+loopsize+' : <input type="text" class="form-control" style="width: 95%" id="size1" placeholder="ขนาด" name="size[]" required> </a> </div>'
        $('#div_size').append(a)
        loopsize = loopsize + 1;
    }
</script>

<script>
    function create_data() {
        var r = confirm('คุณต้องการสร้างสินค้านี้ ใช่หรือไม่');
        if (r == true) {
            var formData = new FormData($("#Create_product")[0]);
            $.ajax({
                url: "{{url('/store/product')}}",
                type: "POST",
                data: formData,
                processData: false, //Not to process data
                contentType: false, //Not to set contentType
                success: function (res) {
                    if (res == 'Success') {
                        alert('สร้างสินค้า สำเร็จ')
                        window.location.reload();
                    } else {
                        alert('สร้างสินค้า ไม่สำเร็จ')
                        // window.location.reload();
                    }
                },
                error: function (res) {
                    if(res.responseText == '{"message":"The given data was invalid.","errors":{"advertising_img":["The advertising img may not be greater than 2048 kilobytes."]}}'){
                        alert('สร้างสินค้า ไม่สำเร็จ : รูปมีขนาดมากว่า 2 MB ')
                    }else{
                        alert('505 : Internal server error')
                    }
                    // window.location.reload();
                }
            });

        }
    }

    {{--function update_data(id) {--}}
    {{--    var r = confirm('คุณต้องการอัพเดรตโฆษณานี้ ใช่หรือไม่');--}}
    {{--    if (r == true) {--}}
    {{--        var formData = new FormData($("#Create_product")[0]);--}}
    {{--        $.ajax({--}}
    {{--            url: "{{url('Advertising/')}}/" + id + "/update",--}}
    {{--            type: "POST",--}}
    {{--            data: formData,--}}
    {{--            processData: false, //Not to process data--}}
    {{--            contentType: false, //Not to set contentType--}}

    {{--            success: function (res) {--}}
    {{--                console.log(res)--}}
    {{--                if (res == 'Success') {--}}
    {{--                    alert('อัพเดรตโฆษณา สำเร็จ')--}}
    {{--                    window.location.reload();--}}
    {{--                } else {--}}
    {{--                    alert('อัพเดรตโฆษณา ไม่สำเร็จ')--}}
    {{--                    // window.location.reload();--}}
    {{--                }--}}
    {{--            },--}}
    {{--            error: function (res) {--}}
    {{--                alert('505 : Internal server error ajax')--}}
    {{--                // window.location.reload();--}}
    {{--            }--}}
    {{--        });--}}
    {{--    }--}}
    {{--}--}}

</script>

