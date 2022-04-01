@extends('layouts.app')

@section('content')
<div class="mt-3">

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card-style settings-card-2 mb-30">
          <div class="title mb-30">
            <h6>System Setting</h6>
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
          </div>
          <form action="{{route('setting.update')}}" method="POST">
              @csrf
            <div class="row">
              <div class="col-12">
                <div class="input-style-1">
                  <label>Current Master Key</label>
                  <input type="password" placeholder="xxxx" name="current_master_key" id="current_master_key" value="{{old('current_master_key')}}" />
                  @error('current_master_key')
                      <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>New Master Key</label>
                  <input type="password" placeholder="xxxx" name="new_master_key" id="new_master_key" value="{{old('new_master_key')}}" />
                  @error('new_master_key')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Confirm New Master Key</label>
                  <input type="password" placeholder="xxxx" name="confirmation_new_master_key" id="confirmation_new_master_key"  />
                  @error('confirmation_new_master_key')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <button class="main-btn primary-btn btn-hover">
                  Update Master Key
                </button>
              </div>
            </div>
          </form>
        </div>
        <!-- end card -->
      </div>
</div>
</div>
@endsection
