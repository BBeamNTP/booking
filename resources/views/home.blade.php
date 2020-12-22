@extends('layouts.app')

@section('content')
    <div class="container" align="center">
        <div class="justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('/public/image/1.jpg')}}" alt="Los Angeles" width="1100"
                                     height="500">
                                <div class="carousel-caption">
                                    <h3>Los Angeles</h3>
                                    <p>We had such a great time in LA!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/public/image/2.jpg')}}" alt="Chicago"
                                     width="1100" height="500">
                                <div class="carousel-caption">
                                    <h3>Chicago</h3>
                                    <p>Thank you, Chicago!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/public/image/3.jpg')}}" alt="New York" width="1100"
                                     height="500">
                                <div class="carousel-caption">
                                    <h3>New York</h3>
                                    <p>We love the Big Apple!</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container row" style="padding-top: 20px">
            <div class="col-12 col-md-4">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('public/image/photoevent02.jpg')}}" alt="Los Angeles" width="1100"
                        >
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('public/image/photoevent02.jpg')}}" alt="Los Angeles" width="1100"
                        >
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('public/image/photoevent02.jpg')}}" alt="Los Angeles" width="1100"
                        >
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>We had such a great time in LA!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
