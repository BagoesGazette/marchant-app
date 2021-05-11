@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Product {{ $product->name }}</h1>
    </div>

    <div class="section-body">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td>Product Name</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>Merchant Name</td>
                        <td>{{ $product->relatedMerchant->merchant_name }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Product Status</td>
                        <td>
                            @if ($product->product_status === 'active')
                                <span class="badge badge-pill badge-success">{{ ucwords($product->product_status) }}</span>
                            @elseif($product->product_status === 'not-active')
                                <span class="badge badge-pill badge-danger">{{ ucwords($product->product_status) }}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="float-right">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</section>
@endsection