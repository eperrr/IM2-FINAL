$(document).ready(function () {
   $('.enroll_btn').on('click', function(){
    $('#studentInfoModal').modal('show');
    
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();
    $('#enrollSubjectId').val(data[5]) //id is the fifth element in the array.
    document.getElementById("modalTitle").innerHTML = 'Get enrolled for ' + data[0] +'!'
});

$('#studentInfoForm').on('submit', function(e){
    var contact = '09148238456'
    e.preventDefault();

    var subjectId = $('#enrollSubjectId').val();
    $.ajax({
        type: "POST",
        url: "/enroll/student/"+subjectId,
        data: $('#studentInfoForm').serialize(),
        success: function (response) {
            $('#studentInfoModal').modal('hide');
            console.log(response)
            var msg
            switch(parseInt(response)){
                case 0:
                    msg = 'Enrollment failed. Code 0: Subject ID not found.'
                    break;

                case 1:
                    msg = 'Enrollment successful! You will be sent an SMS with your schedule. Please contact the administrator at ' + contact +' for any questions or cancellation.'
                    break;

                case 2:
                    msg = 'Enrollment failed. Code 2: Student information is incorrect.'
                    break;

                case 3:
                    msg = 'You are already enrolled in this subject.'
            }alert(msg)
            location.reload();
        },
        error: function(error) {
            console.log(error);
        }
    });
  });
});