@extends('backend.master')
@section('content')

    <div class="content">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('product.create')}}">
                    <button class="btn btn-primary">CREATE PRODUCT</button>
                </a>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Simple Table</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="">

                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Describes</th>
                                        <th>Statust</th>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td><img src="{{asset('storage/'.$product->image)}}" alt="" style="width: 100px "></td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price}}</td>
                                                @if(isset($product->category))
                                                    <td>{{$product->category->name}}</td>
                                                @else
                                                    <td></td>
                                                @endif
                                                <td>{{$product->describes}}</td>
                                                <td>{{$product->status}}</td>
                                                <td>
                                                    <a href="{{route('product.destroy',$product->id)}}"
                                                       class="btn btn-danger"
                                                       onclick="return confirm('Bạn có muốn xóa không?')">Delete</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('product.edit',$product->id)}}"
                                                       class="btn btn-danger">Edit</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
