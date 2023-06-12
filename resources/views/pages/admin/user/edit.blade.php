@extends('layouts.dashboard')
@section('title')
     Edit User Page
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
             <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" name="name" class="form-control" required value="{{ $item->name }}">
                  </div>
                  <div class="form-group">
                    <label>Email User</label>
                    <input type="email" name="email" class="form-control" required value="{{ $item->email }}">
                  </div>
                  <div class="form-group">
                    <label>Password User</label>
                    <input type="password" name="password" class="form-control">
                    <small>Kosongkan jika tidak ingin ganti password</small>
                  </div>
                  <div class="form-group">
                    <label>Roles</label>
                    <select name="roles" id="" required class="form-control">
                      <option value="{{ $item->roles }}" selected>Tidak Diganti</option>
                      <option value="ADMIN">Admin</option>
                      <option value="USER">User</option>
                    </select>
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

