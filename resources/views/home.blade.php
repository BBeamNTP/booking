@extends('layouts.app')

@section('content')
    <div class="container" align="center">
        <div class="justify-content-center">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">
                            @foreach($sRowProduct as $key=>$rows)
                                @if($key == 0)
                                    <div class="carousel-item active mt-4 mb-4">
                                        <img src="{{asset($rows->image_path."/".$rows->image_name)}}" alt="Los Angeles"
                                             height="300">
                                        {{--                                <div class="carousel-caption">--}}
                                        {{--                                    <h3>ชื่อ : {{$rows->name}}</h3>--}}
                                        {{--                                    <p>สี : {{$rows->color}}</p>--}}
                                        {{--                                </div>--}}
                                    </div>
                                @elseif($key < 3)
                                    <div class="carousel-item mt-4 mb-4">
                                        <img src="{{asset($rows->image_path."/".$rows->image_name)}}" alt="Chicago"
                                             height="300">
                                        {{--                                <div class="carousel-caption">--}}
                                        {{--                                    <h3>ชื่อ : {{$rows->name}}<</h3>--}}
                                        {{--                                    <p>สี : {{$rows->color}}</p>--}}
                                        {{--                                </div>--}}
                                    </div>
                                @endif

                            @endforeach
                        </div>
                        <a class="carousel-control-prev " href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next " href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="container row mt-1" style="padding-top: 20px">
                @if($sRowProduct != null)
                    @foreach($sRowProduct as $rows)
                        <div class="card col-12 mr-2 mb-2" style="width:400px">
                            <div align="center" class="mt-4">
                                <img class="card-img-top" src="{{asset($rows->image_path."/".$rows->image_name)}}"
                                     alt="Card image" style="width:40%">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">ชื่อ : {{$rows->name}}</h4>
                                <p class="card-text">สี : {{$rows->color}}</p>
                                <a href="{{URL('/product/detail/')."/".$rows->product_id}}" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
