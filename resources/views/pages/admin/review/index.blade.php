@extends('layouts.dashboard')
@section('title')
     Dashboard Review Page
@endsection
@section('content')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-body">
          {{-- <a href="{{ route('review.create') }}" class="btn btn-primary mb-3"> + Add Review</a> --}}
            <div class="table-responsive">
              <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Food</th>
                    <th>Comment</th>
                    <th>Rating</th>
                    <th>Status</th>
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
            {data:'user.name', name:'user.name'},
            {data:'food.food_name', name:'food.food_name'},
            // {data:'photo', name:'photo'},
            {data:'comment', name:'comment'},
            {data:'rating', name:'rating'},
            // {data:'is_aktif', name:'is_aktif'},
            {
                data: 'is_aktif',
                name: 'is_aktif',
                render: function (data) {
                    if (data) {
                        return '<span style="color: green; font-weight:bold">Approve</span>';
                    } else {
                        return 'Waiting';
                    }
                }
            },
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