@extends('layouts.dashboard')
@section('title')
     Dashboard Category Page
@endsection
@section('content')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-body">
            {{-- {{ route('category.create') }} --}}
          <a href="{{ route('category.create') }}" class="btn btn-primary mb-3"> + Add Category</a>
            <div class="table-responsive">
              <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Category_id</th>
                    <th>Category_en</th>
                    <th>Photo</th>
                    <th>Slug</th>
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
            {data:'name_id', name:'name_id'},
            {data:'name_en', name:'name_en'},
            {data:'photo', name:'photo'},
            {data:'slug', name:'slug'},
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