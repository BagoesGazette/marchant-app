@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Update Merchant</h1>
    </div>

    <div class="section-body">
        <form action="{{ route('merchant.update', $merchant->merchant_id) }}" method="POST" autocomplete="off">
            @csrf @method('PUT')
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Update Classroom</h5>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="country_code">Country Code</label>
                            <input id="country_code" type="number" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code', $merchant->country_code) }}" autofocus>
        
                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="merchant_name">Merchant Name</label>
                            <input id="merchant_name" type="text" class="form-control @error('merchant_name') is-invalid @enderror" name="merchant_name" value="{{ old('merchant_name', $merchant->merchant_name) }}" autofocus>
        
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
                <button type="button" onclick="Delete(this.id)"  id="{{ $merchant->merchant_id }}" class="btn btn-danger">
                    Delete Data
                </button>
            </div>
        </form>
    </div>
</section>
@endsection

@push('plugin-js')
    <script src="{{ asset('vendors/modules/sweetalert/sweetalert.min.js') }}"></script>
@endpush

@push('custom-js')
   <script>
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
                        url: "{{ route('merchant.index') }}/"+id,
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
                                    window.location = "{{ url("merchant") }}";
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