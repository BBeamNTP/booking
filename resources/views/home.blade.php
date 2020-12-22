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
                                <img src="{{asset('/public/image/1.jpg')}}" alt="Los Angeles"
                                     height="300">
                                <div class="carousel-caption">
                                    <h3>Los Angeles</h3>
                                    <p>We had such a great time in LA!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/public/image/2.jpg')}}" alt="Chicago"
                                     height="300">
                                <div class="carousel-caption">
                                    <h3>Chicago</h3>
                                    <p>Thank you, Chicago!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/public/image/3.png')}}" alt="New York"
                                     height="300">
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
        <div class="container row mt-1" style="padding-top: 20px">

            <div class="card mr-1" style="width:400px">
                <img class="card-img-top" src="{{asset('/public/image/3.png')}}" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
            <div class="card mr-1" style="width:400px">
                <img class="card-img-top" src="{{asset('/public/image/3.png')}}" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
            <div class="card mr-1" style="width:400px">
                <img class="card-img-top" src="{{asset('/public/image/3.png')}}" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection
