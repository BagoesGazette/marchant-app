@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add New Classroom</h1>
    </div>

    <div class="section-body">
        <form action="{{ route('merchant.store') }}" method="POST" autocomplete="off">@csrf
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Add New Merchant</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="country_code">Country Code</label>
                            <input id="country_code" type="number" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}" autofocus>
        
                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="merchant_name">Merchant Name</label>
                            <input id="merchant_name" type="text" class="form-control @error('merchant_name') is-invalid @enderror" name="merchant_name" value="{{ old('merchant_name') }}" autofocus>
        
                            @error('merchant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                    </div>
                </div>
            </div>
            <div class="float-right">
                <a href="{{ route('merchant.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</section>
@endsection