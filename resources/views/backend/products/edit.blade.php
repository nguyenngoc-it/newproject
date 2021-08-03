@extends('backend.master')
@section('content')
    <div class="container-fluid content">
        <h3>EDIT PRODUCT</h3>
        <form method="post" enctype="multipart/form-data" action="{{route('product.update', $product->id)}}">
            @csrf
{{--            @foreach($products as $product)--}}
            <div class="mb-3">
                <label for="name-product" class="form-label">Name</label>
                <input type="text" required class="form-control" id="name-product" name="name_product" value="{{$product->name}}" >
            </div>
            <div class="mb-3">
                <label for="price-product" class="form-label">Price</label>
                <input type="text" required class="form-control" id="price-product" name="price_product" value="{{$product->price}}">
            </div>
{{--                <div class="mb-3">--}}
{{--                    <select class="form-control" id="FormControlSelectCategories" name="id_category">--}}
{{--                        <option>Chon category</option>--}}

{{--                            @if(isset($product->category))--}}
{{--                            <option value="{{$product->id}}">{{$product->category->name}}</option>--}}
{{--                            @elseif(isset($category->category))--}}
{{--                            <option >{{$category->name}}</option>--}}

{{--                            @endif--}}



{{--                    </select>--}}
{{--                </div>--}}
{{--            @if(isset($categories) && count($categories) > 0)--}}
{{--                <div class="mb-3">--}}

{{--                    <select class="form-control" id="FormControlSelectCategories" name="id_category">--}}
{{--                        <option>Chon category</option>--}}
{{--                        @foreach($categories as $category)--}}
{{--                            <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            @endif--}}

            <div class="mb-3">
                <label for="id_category" class="form-label">ID category</label>
                <input type="text" class="form-control" id="id_category" name="id_category" value="{{$product->category_id}}">
            </div>
            <div class="mb-3">
                <label for="describes" class="form-label">Describes</label>
                <input type="text" class="form-control" id="describes" name="describes" value="{{$product->describes}}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="number" class="form-control" id="status" name="status" value="{{$product->status}}">
            </div>
{{--            @endforeach--}}
            <div class="mb-3">
                <label for="avt" class="form-label">Image</label>
                <input type="file" class="form-control" id="avt" name="fileToUpload">
            </div>
            <button type="submit" class="btn btn-primary">Create product</button>
        </form>
    </div>

@endsection
