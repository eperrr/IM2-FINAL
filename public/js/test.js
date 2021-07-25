$(document).ready(function () {              
                $('.enroll_btn').on('click', function(){
                    $('#studentInfoModal').modal('show');
                    
                    $tr = $(this).closest('tr');
            
                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();
            
                    $('#enrollSubjectId').val(data[0]);
                });

                $('#studentInfoForm').on('submit', function(e){
                    e.preventDefault();
            
                    var subjectId = $('#enrollSubjectId').val();
                    $.ajax({
                        type: "POST",
                        url: "/enroll/student/"+subjectId,
                        data: $('#studentInfoForm').serialize(),
                        success: function (response) {
                            console.log(response);
                            $('#studentInfoModal').modal('hide');
                            alert("You have been Enrolled, an SMS will be sent a day before your schedule");
                            //location.reload();
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                  });
});
