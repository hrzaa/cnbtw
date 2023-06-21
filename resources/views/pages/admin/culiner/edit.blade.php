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
             <form action="{{ route('culiner.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Nama Culiner</label>
                    <input type="text" name="culiner_name" class="form-control" value="{{ $item->culiner_name }}">
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select name="categories_id" class="form-control">
                      <option value="{{ $item->categories_id }}" selected>Tidak Diubah</option>
                       @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name_id }}</option>
                      @endforeach
                    </select> 
                  </div>
                  <div class="form-group">
                    <label>Uploader</label>
                    <select name="users_id" class="form-control">
                       <option value="{{ Auth::user()->id }}" selected>{{ Auth::user()->name }}</option>
                    </select>
                  </div>
                   <div class="form-row">
                     <div class="form-group col-md-6">
                      <label>Culiner Desc ID</label>
                      <textarea name="culiner_desc_id">{!! $item->culiner_desc_id !!}</textarea>
                        <script>
                                CKEDITOR.replace( 'culiner_desc_id' );
                        </script>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Culiner History ID</label>
                        <textarea name="culiner_history_id">{!! $item->culiner_history_id !!}</textarea>
                        <script>
                                CKEDITOR.replace( 'culiner_history_id' );
                        </script>
                    </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                      <label>Culiner Desc EN</label>
                      <textarea name="culiner_desc_en">{!! $item->culiner_desc_en !!}</textarea>
                        <script>
                                CKEDITOR.replace( 'culiner_desc_en' );
                        </script>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Culiner History EN</label>
                        <textarea name="culiner_history_en">{!! $item->culiner_desc_en !!}</textarea>
                        <script>
                                CKEDITOR.replace( 'culiner_history_en' );
                        </script>
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
    <style>
      .delete-gallery {
        display: block;
        position: absolute;
        top: -10px;
        right: 0;
      }
    </style>
    <div class="row mt-4">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Upload Gallery Culiner</h5>
          </div>
          <div class="card-body">
            <div class="row">
              @foreach ($item->culiner_galleries as $gallery)
                <div class="col-md-4">
                  <div class="gallery-container">
                    <img src="{{ Storage::url($gallery->photos ?? '') }}" alt="" class="w-100">
                    <a href="{{ route('culiner-gallery-delete', $gallery->id) }}" class="delete-gallery">
                      <img src="{{ url('assets/img/icon-delete.svg') }}" alt="">
                    </a>
                  </div>
                </div>
              @endforeach
              
              <div class="col-12">
                <form action="{{ route('culiner-gallery-upload') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="culiner_id" value="{{ $item->id }}">
                  <input type="file" name="photos" id="file" style="display: none;" onchange="form.submit()">
                  <button type="button" class="btn btn-secondary btn-block mt-2" onclick="thisFileUpload()">
                    Add Photo
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('addon-script')

  <script>
    function thisFileUpload() {
      document.getElementById("file").click();
    }
  </script>

  <!-- ck editor -->
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

@endpush

