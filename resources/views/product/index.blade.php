@extends('layouts.app')

@section('content')
    <div class="container">
        @if($user->administrator == 1)
            <a href="{{route('product.create')}}">Add new product</a>
        @endif
        <table class="table table-borderless ">

            <thead>
            <tr class="justify-content-center">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Price</th>
                <th scope="col">Price with VAT</th>
                <th scope="col"></th>
            </tr>
            </thead>
            @forelse($products as $product)

                <tbody>
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td><a href="{{route('product.show',$product->id)}}">
                            {{$product->name}}</a></td>
                    <td>{{$product->amount}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{Helper::priceVat($product,0.21)}}</td>
                    @if($user->administrator == 1)
                        <td><a href="{{route('product.edit',$product->id)}}">Edit</a></td>
                        <td>
                            <form action="{{route('product.destroy',$product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    @endif

                </tr>

                </tbody>
            @empty
                <h5>There are no products!</h5>
            @endforelse


        </table>
        <div class="row">
            {{ $products->links() }}
        </div>

    </div>



@endsection
