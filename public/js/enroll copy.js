$(document).ready(function () {
    $('#subjectSearchForm').on('submit', function (e) {
        e.preventDefault();
        search = document.getElementById('searchBar').value;
        $.ajax({
            type: "GET",
            url: "/enroll/"+search,
            success: function (response) {
                var showtable = document.getElementById('tb');
                var table = document.getElementById('table');
                var subjects = '';

                for(var i = 0; i < response.length; i++){
                    if(response[i]['enrollees'] < response[i]['capacity']){
                        subjects += '<tr> <td style="display:none;">'+ response[i]['id'] + '</td> <td>'+ response[i]['name'] + '</td> <td>'+ response[i]['enrollees'] + '/' + response[i]['capacity'] +'</td> <td>'+ response[i]['room'] +'</td> <td>' + response[i]['schedule'] + '</td> <td> <a href="#" class="enroll_btn btn btn-outline-success">Enroll</a> </td></tr>'
                    }else{
                        subjects += '<tr> <td>'+ response[i]['name'] + '</td> <td>'+ response[i]['enrollees'] + '/' + response[i]['capacity'] +'</td> <td>'+ response[i]['room'] +'</td> <td>' + response[i]['schedule'] + '</td> </tr>'
                    }
                        
                }

                table.innerHTML = subjects;
                showtable.style.display = "table";
                
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
                            var msg
                            switch(parseInt(response)){
                                case 0:
                                    msg = 'Enrollment failed. Code 0: Subject ID not found.'
                                    break;

                                case 1:
                                    msg = 'Enrollment successful! You will be sent an SMS with your schedule.'
                                    break;

                                case 2:
                                    msg = 'Enrollment failed. Code 2: Student information is incorrect.'
                                    break;

                                case 3:
                                    msg = 'You are already enrolled in this subject.'
                            }alert(msg)
                            //location.reload();
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                  });

            },
            error: function(error){
                console.log(error)
            }
        }); 
    });
});