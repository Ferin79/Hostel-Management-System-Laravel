window.onload = function () {
    refresh_institute_list();
    $('#add_department').submit(function (e) {
        e.preventDefault();
        alert('here');
    });
    $('.add_institute').submit(function (e) {
        e.preventDefault();
        var val = $('#institute').val();
        $('#institute').val('');
        var token = $('#token').val();
        add_institute_ajax(val,token)
    });
    $('#delete_institute').submit(function (e) {
        e.preventDefault();
        var val = $('#record').val();
        var token = $('#token').val();
        delete_institute_ajax(val, token);
    });
    $('.select_institution').blur(function (e) {
        var institution = $('.select_institution option:selected').html();
        $('.display_institute_name').text(institution);
    });
};
function add_institute_ajax(data,token)
{
    $.ajax({
       type:'POST',
       url:'/admin/add_institute',
        data:{
            "_token": token,
           'institute':data
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
        type:'GET',
        url:"/admin/get_institute",
        success:function (result) {
            data = Object.entries(result);
            $('.record').append(`<option value="-1" selected disabled>View All Institutions</option>`);
            for (var i = 0;i<data.length;i++)
            {
                $('.record').append(`<option value='${data[i][1].id}'>${data[i][1].institute}</option>`)
            }
        },
        error:function (error) {

        }
    })
}
function delete_institute_ajax(data,token) {
    $.ajax({
        type:'POST',
        url:'/admin/delete_institute',
        data:{
            "_token": token,
            'id':data
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
