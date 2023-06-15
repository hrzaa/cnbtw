@extends('layouts.dashboard')
@section('title')
     Edit Culiner Page
@endsection
@section('content')
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif
        <div class="card">
          <div class="card-body">
             <form action="{{ route('resto.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                  <div class="form-group">
                    <label>Nama Resto</label>
                    <input type="text" name="resto_name" class="form-control" value="{{ $item->resto_name }}">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Uploader</label>
                      <select name="users_id" class="form-control">
                         <option value="{{ $item->users_id }}" selected>{{ $item->user->name }}</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Culiner Category </label>
                      <select name="culiner_id" class="form-control">
                        @foreach ($culiners as $culiner)
                            <option value="{{ $culiner->id }}">{{ $culiner->culiner_name }}</option>
                        @endforeach
                      </select>
                    </div>
                </div>
                  <div class="form-group">
                  <label>Harga Menu</label>
                  <input type="number" name="price" class="form-control" value="{{ $item->price }}">
                </div>
               <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Alamat</label>
                      <input type="text" name="address" class="form-control" value="{{ $item->address }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Alamat(Link Maps)</label>
                      <input type="text" name="address_link" class="form-control" value="{{ $item->address_link }}">
                    </div>
                  </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
                </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('addon-script')
    <!-- ck editor -->
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
@endpush

