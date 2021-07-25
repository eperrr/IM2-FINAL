@extends('layouts.app')

@section('content')
<div class="welcome-container2">
  <div class="welcome"></div>
  
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Offered Recreational Courses</h1>
        <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSubjectModal">
          Add subject
        </button> -->
    </div>
    <table class="table table-light">
    <thead class="thead-dark">
        <tr>
        <th scope="col" class="text-center">Recreational Courses</th>
        <th scope="col" class="text-center">Enrollees</th>
        <th scope="col" class="text-center">Capacity</th>
        <th scope="col" class="text-center">Venue</th>
        <th scope="col" class="text-center">Schedule</th>
        <th scope="col" class="text-center">Instructor</th>
        <th scope="col" class="text-center">Options</th>
        </tr>
    </thead>
    <tbody>
      @foreach($subjects as $subject)
        <tr style="text-align: center; vertical-align: middle" >
        <td>{{ $subject->name }}</td>
        <td>{{ $subject->enrollees }}</td>
        <td>{{ $subject->capacity }}</td>
        <td>{{ $subject->room }}</td>
        <td>{{ $subject->schedule }}</td>
        <td>{{ $subject->instructor }}</td>
        <td style="display:none;" class="subId">{{ $subject->id }}</td>
        <td>
        <a href="#" class="enroll_btn btn btn-outline-success">Enroll</a>

        </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  </div>         
</div>

<div>
<!----------------------------------------------- STUDENT INFORMATION MODAL START ----------------------------------------------->
    <div class="modal fade" id="studentInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark text-center" style="width:100%;" id="modalTitle"></h5>
                </div>
                <div class="modal-body">
                    <form id="studentInfoForm" class="text-left text-dark" style="font-weight:400;">
                        {{ csrf_field() }}
                        <input type="hidden" id="enrollSubjectId" placeholder="test" >
                        <div class="form-group">
                            <label for="id">Enrollee ID:</label>
                            <input type="text" class="form-control" name="id" placeholder="Ex: 2110xxxx -> subdivision ID">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">House Code:</label>
                            <input type="text" class="form-control" name="house_code" placeholder="Enter Blk & Lot Number">
                        </div>
                        <input type="submit" class="btn btn-outline-success" style="width:100%;" value="Enroll">
                    </form>
                </div>
            </div>
        </div>
    </div>
<!----------------------------------------------- STUDENT INFORMATION MODAL END ----------------------------------------------->
</div>
<script src="{{asset('js/enroll.js')}}"></script>
@endsection