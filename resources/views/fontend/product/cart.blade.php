@extends('fontend.master')
@section('content')
    <div class="cart_wrapper">
        @csrf
@include('fontend.product.compoments.cart_compoment')
    </div>

@endsection
