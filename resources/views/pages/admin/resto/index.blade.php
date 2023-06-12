@extends('layouts.dashboard')
@section('title')
     Dashboard Resto Page
@endsection
@section('content')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-body">
          <a href="{{ route('resto.create') }}" class="btn btn-primary mb-3"> + Add Resto</a>
            <div class="table-responsive">
              <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Resto</th>
                    <th>Uploader</th>
                    <th>Culiner</th>
                    <th>Price</th>
                    <th>Address</th>
                    <th>Address Link</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('addon-script')
   <script>
    var datatable = $('#crudTable').DataTable({
        procesing: true,
        serverSide: true,
        ordering : true,
        ajax:{
            url:'{!! url()->current() !!}',
        },
        columns:[
            {data:'id', name:'id'},
            {data:'resto_name', name:'resto_name'},
            {data:'user.name', name:'user.name'},
            {data:'culiner.culiner_name', name:'culiner.culiner_name'},
            {data:'price', name:'price'},
            {data:'address', name:'address'},
            {data:'address_link', name:'address_link'},
            
            {
                data:'action',
                name:'action',
                orderable:false,
                searchable:false,
                width:'15%'
            },
        ]
        });
  </script>

@endpush
