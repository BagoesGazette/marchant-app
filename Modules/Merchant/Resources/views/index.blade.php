@extends('layouts.app')

@push('plugin-css')
    <link rel="stylesheet" href="{{ asset('vendors/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/modules/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Merchant</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title text-right">Merchant Lists</h4>
                <a href="{{ route('merchant.create') }}" class="btn btn-primary text-right">Add New Merchant</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Country Code</th>
                            <th>Merchant Name</th>
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
            ajax: "{{ route('merchant.ajax') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'merchant_id'},
                {data: 'country_code', name: 'country_code'},
                {data: 'merchant_name', name: 'merchant_name'},
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