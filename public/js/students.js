$(document).ready(function () {

    // <------------------------------ SEARCH STUDENT RECORDS --------------------------->

    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    
    
    
    
    // <------------------------------ ADDING A STUDENT RECORD --------------------------->
    $('#addStudentForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/students",
            data: $('#addStudentForm').serialize(), 
            success: function (response) {
                console.log(response)
                $('#addStudentModal').modal('hide')
                alert("Data Saved");
                // location.reload();
            },
            error: function(error){
                console.log(error)
                alert("Data Not Saved")
            }
        });
    });
    // <------------------------------ ADDING A STUDENT RECORD END --------------------------->


    // <------------------------------ DELETEING A STUDENT RECORD --------------------------->
    $('.delete_btn').on('click', function() {
            
        $('#deleteStudentModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#studentDeleteId').val(data[0]);
    });
  
    $('#deleteStudentForm').on('submit', function(e){
            e.preventDefault();

            var id = $('#studentDeleteId').val();

            $.ajax({
                type: "DELETE",
                url: "/students/delete/"+id,
                data: $('#deleteStudentForm').serialize(),
                success: function (response) {
                    console.log(response);
                        $('#deleteStudentModal').modal('hide');
                        alert("Data Deleted");
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
            });
    });
    // <------------------------------ DELETEING A STUDENT RECORD END --------------------------->

    // <------------------------------ EDITING AND UPDATING A STUDENT RECORD --------------------------->
    $('.edit_btn').on('click', function(){
        $('#editStudentModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#firstName').val(data[1]);
        $('#lastName').val(data[2]);
        $('#id').val(data[0]);
        $('#originalId').val(data[0]);
        $('#house_code').val(data[3]);
        $('#contact_number').val(data[4]);
        $('#status').val(data[5]);
    });

    $('#editStudentForm').on('submit', function(e){
        e.preventDefault();

        var id = $('#originalId').val();
        $.ajax({
            type: "PUT",
            url: "/students/edit/"+id,
            data: $('#editStudentForm').serialize(),
            success: function (response) {
                console.log(response);
                $('#editStudentModal').modal('hide');
                alert("Data Updated");
                //location.reload();
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
    // <------------------------------ EDITING AND UPDATING A STUDENT RECORD END --------------------------->

    // <------------------------------ VIEWING A STUDENT RECORD --------------------------->
    $('.view_btn').on('click', function(){
        $('#viewStudentModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('.showFirstName').text("First Name: "+data[1]);
        $('.showLastName').text("Last Name: "+data[2]);
        $('.showId').text("ID: "+data[0]);
        $('.showHouseCode').text("House Code: "+data[3]);
        $('.showContactNumber').text("Contact Number: "+data[4]);
    });
    // <------------------------------ VIEWING A STUDENT RECORD END--------------------------->
});