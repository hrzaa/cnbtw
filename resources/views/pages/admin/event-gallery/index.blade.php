@extends('layouts.dashboard')
@section('title')
     Dashboard Event Gallery Page
@endsection
@section('content')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-body">
          <a href="{{ route('event-gallery.create') }}" class="btn btn-primary mb-3"> + Add Event Gallery</a>
            <div class="table-responsive">
              <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Event</th>
                    <th>Photo</th>
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
            {data:'event.event_name', name:'event.event_name'},
            {data:'photo', name:'photo'},
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