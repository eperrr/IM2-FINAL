@extends('layouts.app')

@section('content')
<div class="welcome-container2">
    <div class="welcome"></div>
    
<div class="container pt-4">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Registered Home Owners</h1>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStudentModal">
                Add student
        </button>
    </div>
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
        <br>
    <table class="table table-light">
    <thead class="thead-dark">
        <tr>
        <th scope="col" class="text-center">ID Number</th>
        <th scope="col" class="text-center">First Name</th>
        <th scope="col" class="text-center">Last Name</th>
        <th scope="col" class="text-center">House Code</th>
        <th scope="col" class="text-center">Contact Number</th>
        <!-- <th scope="col" class="text-center" style = "display:none">Course</th> -->
        <th scope="col" class="text-center">Status</th>
        <th scope="col" class="text-center">Options</th>
       
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach($students as $student)
        <tr style="text-align: center; vertical-align: middle" >
            <td>{{ $student->id }}</td>
            <td>{{ $student->first_name }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->house_code }}</td>
            <td>{{ $student->contact_number }}</td>
            <!-- <td style = "display:none">{{ $student->course }}</td> -->
            <td>{{ $student->status }}</td>
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

<div>
<!----------------------------------------------- ADD STUDENT MODAL START ----------------------------------------------->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark text-center" style="width:100%;" id="exampleModalLongTitle">Add student</h5>
                </div>
                <div class="modal-body">
                    <form id="addStudentForm" class="text-left text-dark" style="font-weight:400;">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name:</label>
                            <input type="text" class="form-control" name="fname" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name:</label>
                            <input type="text" class="form-control" name="lname" placeholder="Enter last name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Number:</label>
                            <input type="text" class="form-control" name="id" placeholder="Ex: 2110xxxx -> -> BLK & LOT #">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">House Code:</label>
                            <input type="text" class="form-control" name="house_code" placeholder="Enter Blk & Lot Number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contact Number:</label>
                            <input type="text" class="form-control" name="contact_number" placeholder="Enter contact number:">
                        </div>
                        <input type="submit" class="btn btn-outline-secondary" style="width:100%;" value="Add">
                    </form>
                </div>
            </div>
        </div>
    </div>
<!----------------------------------------------- ADD STUDENT MODAL END ----------------------------------------------->
</div>

<div>
<!----------------------------------------------- DELETE STUDENT MODAL START ----------------------------------------------->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-center" style="width:100%">Are you sure you want to delete this student?</h5>
                </div>
                <div class="modal-body">
                    <form class="text-center" id="deleteStudentForm">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="hidden" id="studentDeleteId" name="studentDeleteId">
                        <button type="submit" class="btn btn-outline-success" style="width:40%;">Yes</button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="width:40%;">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!----------------------------------------------- DELETE STUDENT MODAL END ----------------------------------------------->    
</div>

<div>
<!----------------------------------------------- VIEW STUDENT MODAL START ----------------------------------------------->
<div class="modal fade" id="viewStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-center" style="width:100%;" id="exampleModalLongTitle">Enrollee Info</h5>
        </div>
        <div class="modal-body">
            <div class="card">
                <ul class="list-group list-group-flush text-center">
                    <li class="showFirstName list-group-item"></li>
                    <li class="showLastName list-group-item"></li>
                    <li class="showId list-group-item"></li>
                    <li class="showHouseCode list-group-item"></li>
                    <li class="showContactNumber list-group-item"></li>
                    <li class="showStatus list-group-item"></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>
<!----------------------------------------------- VIEW STUDENT MODAL END ----------------------------------------------->
</div>

<div>
<!----------------------------------------------- EDIT STUDENT MODAL START ----------------------------------------------->    
    <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark text-center" style="width:100%;" id="exampleModalLongTitle">Edit student</h5>
                </div>
                <div class="modal-body">
                    <form id="editStudentForm"class="text-dark text-left">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name:</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID Number:</label>
                            <input type="text" class="form-control" id="id" name="id" placeholder="Ex: 2110xxxx -> subdivision ID">
                            <input type="hidden" id="originalId">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">House Code:</label>
                            <input type="text" class="form-control" id="house_code" name="house_code" placeholder="Enter Blk & Lot Number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contact Number:</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter contact number:">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Status:</label>
                            <div class="dropdown">
                                <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style= "width:100%">
                                {{ $student->status }}
                                </button> -->
                                <!-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style= "width:100%">
                                    <li><a class="dropdown-item" href="#">Pending</a><li>
                                    <li><a class="dropdown-item" href="#">Enrolled</a><li>
                                    <li><a class="dropdown-item" href="#">Unenrolled</a><li>
                                    <li><a class="dropdown-item" href="#">Deleted</a><li>
                                </ul> -->
                                <select class="form-select" name="status" aria-label="Select the student's status" style="width:100%; height:35px;">
                                    <option>Enrolled</option>
                                    <option>Unenrolled</option>
                                    <option>Deleted</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-outline-secondary" style="width:100%;" value="Save">
                    </form>
            </div>
        </div>
    </div>
<!----------------------------------------------- DELETE STUDENT MODAL END ----------------------------------------------->
</div>
<script src="{{asset('js/students.js')}}"></script>
@endsection