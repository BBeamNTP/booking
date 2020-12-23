@extends('layouts.app')

@section('content')
    <div class="container" align="center">

        <form method="POST"
              action="{{ URL('/product/booking/'.$sRowProduct[0]->product_id)}}"
              enctype="multipart/form-data"
              class="frm_account">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($sRowProduct as $key=>$rows)
                                    <div class="carousel-item active">
                                        <img src="{{asset($rows->image_path."/".$rows->image_name)}}" alt="Los Angeles"
                                             height="300">
                                        {{--                                <div class="carousel-caption">--}}
                                        {{--                                    <h3>ชื่อ : {{$rows->name}}</h3>--}}
                                        {{--                                    <p>สี : {{$rows->color}}</p>--}}
                                        {{--                                </div>--}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container row" style="padding-top: 20px" align="center">
                <div>
                    <h3>ชื่อสินค้า : {{$sRowProduct[0]->name}}</h3>
                </div>
                <div style="padding-top: 10px" class="container row">
                    <div class="col-5" style="text-align: right">
                        <label> สี : </label>
                    </div>
                    <div class="col-7" align="left" id="value_color">
                        @foreach($sRowColor as $key => $rows)
                            <button type="button" class="btn btn-outline-secondary btn_color" id="btncolor{{$key}}"
                                    name="btncolor{{$key}}"
                                    onclick="active_btn_color({{$key}}), value_color('{{$rows->color_name}}')"> {{$rows->color_name}}</button>
{{--                            <input type="hidden" name="color" id="color" value="{{$rows->color_name}}" required>--}}
                        @endforeach
                    </div>

                </div>

                <div style="padding-top: 10px" class="container row">
                    <div class="col-5" style="text-align: right">
                        <label> ไซต์ : </label>
                    </div>
                    <div class="col-7" align="left" id="value_size">
                        @foreach($sRowSize as $key => $rows)
                            <button type="button" class="btn btn-outline-secondary btn_size" id="btnsize{{$key}}"
                                    name="btnsize{{$key}}"
                                    onclick="active_btn_size({{$key}}), value_size('{{$rows->size_name}}')"> {{$rows->size_name}}</button>
{{--                            <input type="hidden" name="size" id="size" value="{{$rows->size_name}}" required>--}}
                        @endforeach
                    </div>
                </div>
                <div style="padding-top: 10px" class="container row">
                    <div class="col-5" style="text-align: right">
                        <label> จำนวน : </label>
                    </div>
                    <div class="col-7" align="left" id="value_size">
                        <input type="number" id="quantity" name="quantity" min="1" max="999" style="width: 30%">
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-4" >
                <a type="button" class="btn btn-primary " href="{{url('/home')}}">ย้อนกลับ</a>
                <button class="btn btn-success ">ใส่รถเข็น</button>
            </div>
            <div id="values_color">

            </div>
            <div id="values_size">

            </div>
        </form>
    </div>
@endsection
<script>
    // $(document).ready(function () {
    //
    //         $('.btn_color').removeClass('active')
    //         $('#btncolor0').addClass('active')
    //         $('.btn_size').removeClass('active')
    //         $('#btnsize0').addClass('active')
    // });
</script>

<script>

    function active_btn_color(key) {
        // console.log('TEST' + key)
        $('.btn_color').removeClass('active')
        $('#btncolor' + key).addClass('active')
    }

    function active_btn_size(key) {
        // console.log('TEST' + key)
        $('.btn_size').removeClass('active')
        $('#btnsize' + key).addClass('active')
    }

    function value_color(value){
        var a = '';
        a += '<input class="color_input" type="hidden" name="color" id="color" value="'+value+'" required>'
        $('#values_color').html(a)
    }
    function value_size(value){
        var a = '';
        a += '<input class="size_input" type="hidden" name="size" id="size" value="'+value+'" required>'
        $('#values_size').html(a)
    }
</script>
