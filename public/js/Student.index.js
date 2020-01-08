window.onload = function () {
    load_institution_list();
    $('#profileBtn').click(function () {
        swal({
            title: "Good job!",
            text: "Your Data is Updated",
            icon: "success",
            button: "Aww yiss!",
        });
    });
    $('#institution').blur(function () {
        id = $(this).val();
        if (parseInt(id) > 0) {
            $.ajax({
                type: "GET",
                url: "/student/get_department",
                data: {
                    "institute_id": id,
                },
                success: function (result) {
                    data = Object.entries(result);
                    $('.add_department').empty();
                    $('.add_department').append(`<option value="-1" selected disabled>Select Department</option>`)
                    for (var i = 0; i < data.length; i++) {
                        $('.add_department').append(`<option value='${data[i][1].id}'>${data[i][1].department_name}</option>`);
                    }
                },
                error: function () {

                }
            });
        }
    });
    $('#degree').blur(function () {
        val = parseInt($(this).val());
        if(val === -1)
        {
            swal({
                title: "Awwwwww!",
                text: "Please Select Passout Education",
                icon: "warning",
            });
        }
        else if(val === 1)
        {
            $('.marks_wrapper').show();
            $('.sem_wrapper').hide();
            $('#label_marks').text("Enter Marks");
            $('#marks').attr('value',"");
            $('#marks').attr("placeholder","Enter Marks");
            $('#marks').attr("max","100");
        }
        else if(val === 0)
        {
            $('.marks_wrapper').show();
            $('.sem_wrapper').show();
            $('#label_marks').text('Enter CGPA');
            $('#marks').attr("placeholder","Enter CGPA");
            $('#marks').attr("max","10");
            $('#marks').attr('value',"");
        }
    });
};

function load_institution_list() {
    $.ajax({
        type: 'GET',
        url: "/student/get_institution",
        success: function (result) {
            data = Object.entries(result);
            $('.add_institute').empty();
            $('.add_institute').append(`<option value="-1" selected disabled>Select Institution</option>`)
            for (var i = 0; i < data.length; i++) {
                $('.add_institute').append(`<option value='${data[i][1].id}'>${data[i][1].institute}</option>`);
            }
        },
        error: function () {

        }
    });
}
