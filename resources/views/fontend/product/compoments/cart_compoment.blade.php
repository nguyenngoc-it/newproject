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
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quatity</th>
                                    <th>Total</th>
                                    <th>Remove</th>


                                    </thead>
                                    <tbody>
                                    @php
                                        $total=0;
                                    @endphp
{{--                                    @if(!$cart ==null)--}}

                                    @foreach($cart as $id=>$product)
                                        @php
                                            $total +=$product['price']*$product['quantity'];
                                        @endphp
                                        <tr>

                                            <td>{{$product['name']}}</td>
                                            <td><img style="width: 100px; height: 100px"
                                                     src="{{asset('storage/'.$product['image'])}}" alt=""></td>
                                            <td>{{number_format($product['price'])}}$</td>
                                            <td><input type="number" value="{{$product['quantity']}}" min="1"></td>
                                            <td>{{number_format($product['price']*$product['quantity'])}}$</td>
                                            <td>
                                                <a data-id={{$id}}  class="btn btn-primary cartUpdate">Update</a>
                                                <a class="btn btn-danger cartRemove">Remove</a>
                                            </td>
                                        </tr>
                                    @endforeach
{{--                                    @endif--}}

                                    </tbody>
                                </table>
                                <div class="col-md-12">
                                    <h3>Total: {{number_format($total)}}$</h3>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
