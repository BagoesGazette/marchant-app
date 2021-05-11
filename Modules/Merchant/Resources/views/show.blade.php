@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Merchant {{ $merchant->merchant_name }}</h1>
    </div>

    <div class="section-body">
        <div class="shadow p-3 mb-5 bg-white rounded">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <td>Country Code</td>
                        <td>{{ $merchant->country_code }}</td>
                    </tr>
                    <tr>
                        <td>Merchant Name</td>
                        <td>{{ $merchant->merchant_name }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="float-right">
            <a href="{{ route('merchant.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</section>
@endsection