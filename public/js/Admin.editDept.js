window.onload = function () {
    document.querySelector('#menu-toggle').addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector('#wrapper').classList.toggle('toggled');
    });
    refresh_institute_list();
    refresh_department_list();
    $('#add_department').submit(function (e) {
        e.preventDefault();
        institute_id = $('.select_institution').val();
        if(parseInt(institute_id) > 0)
        {
            token = $('#token_dept').val();
            data = $('#add_deparment_input').val();
            $.ajax({
                type: 'POST',
                url: "/admin/add-department",
                data: {
                    '_token': token,
                    'institution_id':institute_id,
                    'department_name': data
                },
                success: function () {
                    swal({
                        title: "Department Added",
                        icon: "success",
                    });
                    refresh_department_list();
                },
                error: function () {
                    swal({
                        title: "Error Occured",
                        icon: "error",
                    });
                }
            });
        }
        else
        {
            swal({
                title: "Oops",
                text:"Please Select Institution",
                icon: "warning",
            });
        }
    });
    $('.add_institute').submit(function (e) {
        e.preventDefault();
        var val = $('#institute').val();
        $('#institute').val('');
        var token = $('#token').val();
        add_institute_ajax(val, token)
    });
    $('#delete_institute').submit(function (e) {
        e.preventDefault();
        var val = $('#record').val();
        var token = $('#token').val();
        delete_institute_ajax(val, token);
    });
    $('.select_institution').blur(function (e) {
        data = $('.select_institution').val();
        if(parseInt(data) > 0)
        {
            var institution = $('.select_institution option:selected').html();
            $('.display_institute_name').text(institution);
            refresh_department_list();
        }
    });
};

function add_institute_ajax(data, token) {
    $.ajax({
        type: 'POST',
        url: '/admin/add_institute',
        data: {
            "_token": token,
            'institute': data
        },
        success: function () {
            swal({
                title: "Institution Added",
                icon: "success",
            });
            refresh_institute_list();
        },
        error: function () {
            swal({
                title: "Failed",
                text: "Oops, Error Occured Try Again",
                icon: "error",
            });
        }
    })
}

function refresh_institute_list() {
    $('.record').empty();
    $.ajax({
        type: 'GET',
        url: "/admin/get_institute",
        success: function (result) {
            data = Object.entries(result);
            $('.record').append(`<option value="-1" selected disabled>View All Institutions</option>`);
            for (var i = 0; i < data.length; i++) {
                $('.record').append(`<option value='${data[i][1].id}'>${data[i][1].institute}</option>`)
            }
        },
        error: function (error) {

        }
    });
}

function delete_institute_ajax(data, token) {
    $.ajax({
        type: 'POST',
        url: '/admin/delete_institute',
        data: {
            "_token": token,
            'id': data
        },
        success: function () {
            swal({
                title: "Institution Removed",
                icon: "success",
            });
            refresh_institute_list();
        },
        error: function () {
            swal({
                title: "Failed",
                text: "Oops, Error Occured Try Again",
                icon: "error",
            });
        }
    })
}
function refresh_department_list() {
    $('.course_added_area').empty();
    institute_id = $('.select_institution').val();
    if (parseInt(institute_id) > 0)
    {
        $.ajax({
            type: 'GET',
            url: "/admin/get_department",
            data:{
                "institution_id":institute_id,
            },
            success: function (result) {
                data = Object.entries(result);
                for(var i = 0;i<data.length;i++)
                {
                    $('.course_added_area').append(`<br />${i+1}. <td>${ data[i][1].department_name }</td>`);
                }
            },
            error: function (error) {

            }
        });
    }
}
