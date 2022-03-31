@extends('layouts.app')

@section('content')
<div class="mt-3">

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card-style settings-card-2 mb-30">
          <div class="title mb-30">
            <h6>My Profile</h6>
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          </div>
          <form action="{{route('profile.update')}}" method="POST">
              @csrf
            <div class="row">
              <div class="col-12">
                <div class="input-style-1">
                  <label>Full Name</label>
                  <input type="text" placeholder="Full Name" name="name" id="name" value="{{old('name') ?? auth()->user()->name}}" />
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Username</label>
                  <input type="text" placeholder="Username" name="username" id="username" value="{{old('username') ?? auth()->user()->username}}" />
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Current Password</label>
                  <input type="password" placeholder="Current Password" name="current_password" id="current_password" />
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>New Password</label>
                  <input type="password" placeholder="New Password" name="password" id="password" />
                </div>
              </div>
              <div class="col-12">
                <div class="input-style-1">
                  <label>Confirm New Password</label>
                  <input type="password" placeholder="Confirm New Password" name="password_confirmation" id="password_confirmation" />
                </div>
              </div>
              <div class="col-12">
                <button class="main-btn primary-btn btn-hover">
                  Update Profile
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
