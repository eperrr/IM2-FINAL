@extends('layouts.app')

@section('content')
    <div class="welcome-container2">
        <div class="welcome"></div>
        
<div class="container">
            <div class="landingText text-center">
                <h1>Welcome {{Auth::user()->first_name}}!<a href="/admin/profile" class="btn btn-lg"style="background-color:transparent;"><i class="fa fa-edit"></i></a></h1>
            </div> 


<br><br><div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">Registered Home Owners</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$students}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">Enrolled Home Owners</p>
            <div class="fluid-container">
            <h3 class="font-weight-medium text-right mb-0">{{$enrolled}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">Unenrolled Home Owners</p>
            <div class="fluid-container">
            <h3 class="font-weight-medium text-right mb-0">{{$unenrolled}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">Pending Home Owners</p>
            <div class="fluid-container">
            <h3 class="font-weight-medium text-right mb-0">{{$pending}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-right">
            <p class="mb-0 text-right">Confirmed Home Owners</p>
            <div class="fluid-container">
            <h3 class="font-weight-medium text-right mb-0">{{$students}}</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div><br><br>






    <br><br><div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Management Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <a href="{{ route('student.index') }}">View Home Owners</a>
                    </div>
                    <div>
                        <a href="{{ route('subject.index') }}">View Recreational Courses</a>
                    </div>
                    <div>
                        <a href="/profile">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
