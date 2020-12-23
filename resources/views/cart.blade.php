@extends('layouts.app')

@section('content')
    <div class="container" align="center">

        <form method="POST"
              action=""
              enctype="multipart/form-data"
              class="frm_account">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="justify-content-center">
                <div class="col-12 ">
                    <div class="card ">
                        <div class="col-12 row">
                            <div class="col-4 mt-4">
                            <h3>ภาพสินค้า</h3>
                            </div>
                            <div class="col-4 mt-4">
                                <h3>ชื่อสินค้า</h3>
                            </div>
                            <div class="col-4 mt-4">
                                <h3>จำนวนสินค้า</h3>
                            </div>
                        </div>
                    </div>
                    @foreach($cart as $rows)
                        <div class="card ">
                            <div class="col-12 row">
                                <div class="col-4 mt-2 mb-2">
                                    <img src="{{asset($rows->image_path.'/'.$rows->image_name)}}" class="rounded" alt="Cinque Terre" width="200px">
                                </div>
                                <div class="col-4 mt-5">
                                    <h4>{{$rows->product_name}}</h4>
                                </div>
                                <div class="col-4 mt-5">
                                    <h4>{{$rows->quantity}}</h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </form>
    </div>
@endsection

