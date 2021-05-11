@extends('layouts.app')

@push('plugin-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Product</h1>
    </div>

    <div class="section-body">
        <form action="{{ route('product.update', $product->product_id) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Update Product</h5>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}" autofocus>
            
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="merchant_id">Merchant</label>
                                <select name="merchant_id" class="form-control select2 @error('merchant_id') is-invalid @enderror" id="merchant_id">
                                        <option selected disabled>Select a merchant</option>
                                    @foreach ($merchant as $row)
                                        @if ($row->merchant_id === $product->merchant_id)
                                            <option value="{{ $row->merchant_id }}" selected>{{ $row->merchant_name }}</option>
                                        @else
                                            <option value="{{ $row->merchant_id }}">{{ $row->merchant_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('merchant_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Product Price</label>
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price) }}" autofocus>
            
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Product Status</label>
                                <br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="female" name="product_status" value="active" 
                                    class="custom-control-input" {{ $product->product_status == 'active' ? ' checked="checked"' : '' }} >
                                    <label class="custom-control-label" for="female">Active</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="male" name="product_status" value="not-active" 
                                    class="custom-control-input" {{ $product->product_status == 'not-active' ? ' checked="checked"' : '' }}>
                                    <label class="custom-control-label" for="male">Not Active</label>
                                </div>
                                @error('product_status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                    </div>
                </div>
            </div>
            <div class="float-right">
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <button type="button" onclick="Delete(this.id)"  id="{{ $product->product_id }}" class="btn btn-danger">
                    Delete Data
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

@push('plugin-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('vendors/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
            $('.select2').select2();

            function Delete(id) {
            swal({
                title: 'Are you sure?',
                text: 'Do you want to remove this data?',
                icon: 'warning',
                buttons: ['Cancel','Yes, delete it!'],
                closeOnClickOutside: false,
                closeOnEsc: false,
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    //ajax delete
                    jQuery.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: "{{ route('product.index') }}/"+id,
                        data: {
                            id : id
                        },
                        type: 'DELETE',
                        success: function (response) {
                            console.log(response);
                            if (response.status === "success") {
                                swal({
                                    title: 'Success!',
                                    text: 'Data successfully removed',
                                    icon: 'success',
                                    timer: 5000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    window.location = "{{ url("product") }}";
                                });
                            } else {
                                swal({
                                    title: 'Failed!',
                                    text: 'Data failed to remove',
                                    icon: 'error',
                                    timer: 5000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });
                } else {
                    return true;
                }
            })
        }

    </script>
@endpush