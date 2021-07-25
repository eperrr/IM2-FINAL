@extends('layouts.app')

@section('content')
<div class="welcome-container2">
  <div class="welcome"></div>
  
<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Offered Recreational Courses</h1>
        <a class="btn btn-success" style="margin-left: 350px;" href="/test">
          Enroll student
        </a>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSubjectModal">
          Add subject
        </button>
        
    </div>
    <table class="table table-light">
    <thead class="thead-dark">
        <tr>
        <th scope="col" class="text-center">Recreational Course</th>
        <th scope="col" class="text-center">Enrollees</th>
        <th scope="col" class="text-center">Options</th>
        </tr>
    </thead>
    <tbody>
      @foreach($subjects as $subject)
        <tr style="text-align: center; vertical-align: middle" >
        <td>{{ $subject->name }}</td>
        <td>{{ $subject->enrollees }}</td>
        <td style="display:none;">{{ $subject->capacity }}</td>
        <td style="display:none;">{{ $subject->room }}</td>
        <td style="display:none;">{{ $subject->schedule }}</td>
        <td style="display:none;" class="subId">{{ $subject->id }}</td>
        <td>
          <a href="#" class="btn btn-outline-primary view_btn">View</a>
          <a href="#" class="btn btn-outline-success edit_btn">Edit</a>
          <a href="#" class="btn btn-outline-danger delete_btn">Delete</a>
        </td>
        </tr>
        @endforeach
    </tbody>
    </table>
  </div>         
</div>

<div>
  <!----------------------------------------------- ADD SUBJECT MODAL START ----------------------------------------------->
  <div class="modal fade" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark text-center" style="width:100%;">Add subject</h5>
        </div>
        <div class="modal-body">
        <form id="addSubjectForm" class="text-left text-dark" style="font-weight:400;">
        {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputEmail1">Subject Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Capacity:</label>
            <input type="text" class="form-control" name="capacity" placeholder="Enter capacity">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Venue:</label>
            <input type="text" class="form-control" name="room" placeholder="Enter room">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Schedule:</label>
            <input type="text" class="form-control" name="schedule" placeholder="Ex: MWF (4:00-5:00 PM)">
          </div>
          <input type="submit" class="btn btn-outline-secondary" style="width:100%;" value="Add">
        </form>
        </div>
      </div>
    </div>
  <!----------------------------------------------- ADD SUBJECT MODAL END ----------------------------------------------->
</div>
<div>
  <!----------------------------------------------- EDIT MODAL START ----------------------------------------------->
  <div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" style="width:100%">Edit course</h5>
        </div>
        <div class="modal-body">
          <form class="text-left" id="editSubjectForm">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            <input type="hidden" id="subjectId" name="subjectId">
            <div class="form-group">
              <label for="exampleInputEmail1">Subject Name:</label>
              <input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Capacity:</label>
              <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Enter capacity">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Venue:</label>
              <input type="text" class="form-control" id="room" name="room" placeholder="Enter room">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Schedule:</label>
              <input type="text" class="form-control" id="schedule" name="schedule" placeholder="Enter schedule">
            </div>
            <input type="submit" class="btn btn-outline-secondary" style="width:100%;" value="Save">
          </form>
        </div>
      </div>
    </div>
<!----------------------------------------------- EDIT MODAL END ----------------------------------------------->
</div>
<div> 
<!----------------------------------------------- VIEW MODAL START ----------------------------------------------->
<div class="modal fade" id="viewEnrollesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Current Enrollees</h5>
          </div>
          <div class="modal-body">
            <table id="tb" class="table text-center">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID Number</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody id="table">
                </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
<!----------------------------------------------- VIEW MODAL END ----------------------------------------------->
</div>
<div> 
<!----------------------------------------------- DELETE MODAL START ----------------------------------------------->
<div class="modal fade" id="deleteSubjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title text-center" style="width:100%">Are you sure you want to delete this subject?</h5>
      </div>
      <div class="modal-body">
      <form class="text-center" id="deleteSubjectForm">
          {{ csrf_field() }}
          {{ method_field('delete') }}
            <input type="hidden" id="subjectDeleteId" name="subjectDeleteId">
            <button type="submit" class="btn btn-outline-success" style="width:40%;">Yes</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="width:40%;">No</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------- DELETE MODAL END ----------------------------------------------->
</div>
<div>
<!----------------------------------------------- DELETE STUDENT ENROLLMENT MODAL START ----------------------------------------------->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title text-center" style="width:100%">Are you sure you want to delete this student from this subject?</h5>
      </div>
      <div class="modal-body">
      <form operation="delete" class="updateRecordForm text-center" id="deleteStudentForm">
          {{ csrf_field() }}
          {{ method_field('post') }}
            <input type="hidden" id="subId" name="subId">
            <input type="hidden" id="studentId" name="studentId">
            <input type="hidden" value="deleted" name="status">
            <button type="submit" class="btn btn-outline-success" style="width:40%;">Yes</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="width:40%;">No</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------- DELETE STUDENT ENROLLMENT MODAL END ----------------------------------------------->
</div>

<!----------------------------------------------- CANCEL ENROLLMENT MODAL START ----------------------------------------------->
<div class="modal fade" id="cancelStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title text-center" style="width:100%">Are you sure you want to cancel this enrollment request?</h5>
      </div>
      <div class="modal-body">
      <form operation="cancel" class="updateRecordForm text-center" id="cancelStudentForm">
          {{ csrf_field() }}
          {{ method_field('post') }}
            <input type="hidden" id="subId" name="subId">
            <input type="hidden" id="studentId" name="studentId">
            <input type="hidden" id="cancel" value="cancelled" name="status">
            <button type="submit" class="btn btn-outline-success" style="width:40%;">Yes</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="width:40%;">No</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------- CANCEL ENROLLMENT MODAL END ----------------------------------------------->

<!----------------------------------------------- APPROVE ENROLLMENT MODAL START ----------------------------------------------->
<div class="modal fade" id="approveStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title text-center" style="width:100%">Are you sure you want to enroll this student?</h5>
      </div>
      <div class="modal-body">
      <form operation="approve" class="updateRecordForm text-center" id="approveStudentForm">
          {{ csrf_field() }}
          {{ method_field('post') }}
            <input type="hidden" id="subId" name="subId">
            <input type="hidden" id="studentId" name="studentId">
            <input type="hidden" value="approved" name="status">
            <button type="submit" class="btn btn-outline-success" style="width:40%;">Yes</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="width:40%;">No</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------- APPROVE ENROLLMENT MODAL END ----------------------------------------------->
<script src="{{asset('js/subjects.js')}}"></script>
@endsection