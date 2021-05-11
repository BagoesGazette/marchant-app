@extends('layouts.app')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendors/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/modules/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Product</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title text-right">Product Lists</h4>
                <a href="{{ route('product.create') }}" class="btn btn-primary text-right">Add New Product</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Merchant Name</th>
                            <th>Product Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@push('plugin-js')
    <script src="{{ asset('vendors/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendors/modules/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush

@push('custom-js')
    <script>
        $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.ajax') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'product_id'},
                {data: 'name', name: 'name'},
                {data: 'related_merchant.merchant_name', name: 'relatedMerchant.merchant_name'},
                {data: 'status', name: 'status',  orderable: false,
                    searchable: false},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>
@endpush