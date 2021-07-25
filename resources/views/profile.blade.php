@extends('layouts.app')


@section('content')

<div class="welcome-container2">
        <div class="welcome"></div>

  <br><br><div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">{{Auth::user()->first_name}}'s Profile</div>
                @if ( Session::get('success'))
				    <div class="alert alert-success">
			            {{ Session::get('success') }}
				    </div>
				@endif
				@if ( Session::get('error'))
					<div class="alert alert-danger">
						{{ Session::get('error') }}
					</div>
				@endif
                <form class="form-horizontal" method="POST" action="/UpdateInfo">
                @csrf
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <div class="form-group row">
                          <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="first_name" placeholder="Name" value="{{ Auth::user()->first_name }}" name="first_name">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="last_name" placeholder="Name" value="{{ Auth::user()->last_name }}" name="last_name">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" placeholder="Email" value="{{ Auth::user()->email }}" name="email">
                                    <span class="text-danger error-text email_error"></span>
                              </div>
                          </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                              </div>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
            </div>
            </div>
           <div>
        </div>
</div>
@endsection
