@extends('fontend.master')
@section('content')


    <div class="content">
        @csrf
        <div class="container-fluid">
            <div class="row">
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
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quatity</th>
                                        <th>Total</th>
                                        <th>Remove</th>

                                        </thead>
                                        <tbody>
                                        @foreach($cart as $product)
                                            <tr>
                                                <td>{{$product['name']}}</td>
                                                <td>{{$product['price']}}</td>
                                                <td>{{$product['quatity']}}</td>
                                                <td>{{$product['price']*$product['quatity']}}</td>
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
