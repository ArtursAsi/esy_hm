@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 40em">
                    <div class="card-header"><h5>{{ $product->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text">Price: {{$product->price}} $</p>
                                <p class="card-text">Amount: {{$product->amount}}</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
