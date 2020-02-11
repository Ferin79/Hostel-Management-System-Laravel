window.onload = function () {
    document.querySelector('#menu-toggle').addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector('#wrapper').classList.toggle('toggled');
    });
    get_institution_list();
    refresh_table();
    $('.add_institution').blur(function (e) {
        data = $('.add_institution').val();
        if (parseInt(data) > 0) {
            refresh_department_list();
        }
    });
    $('.seat_wrapper').submit(function (e) {
        e.preventDefault();
        add_seat_block();
    });

    $('#search_table').on('keyup',function () {
        text = $(this).val().toLowerCase();
        $('table tbody tr').each(function () {
            lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(text) === -1)
            {
                $(this).hide();
            }
            else
            {
                $(this).show();
            }
        })
    });
};

function get_institution_list() {
    $.ajax({
        type: 'GET',
        url: "/admin/get_institute",
        success: function (result) {
            data = Object.entries(result);
            $('.add_institution').append(`<option value="-1" selected disabled>View All Institutions</option>`);
            for (var i = 0; i < data.length; i++) {
                $('.add_institution').append(`<option value='${data[i][1].id}'>${data[i][1].institute}</option>`)
            }
        },
        error: function (error) {

        }
    })
};

function refresh_department_list() {
    $('.add_department').empty();
    institute_id = $('.add_institution').val();
    if (parseInt(institute_id) > 0) {
        $.ajax({
            type: 'GET',
            url: "/admin/get_department",
            data: {
                "institution_id": institute_id,
            },
            success: function (result) {
                data = Object.entries(result);
                $('.add_department').append(`<option value="-1" selected disabled>Select Department</option>`)
                for (var i = 0; i < data.length; i++) {
                    $('.add_department').append(`<option value="${data[i][1].id}">${data[i][1].department_name}</option>`);
                }
            },
            error: function (error) {

            }
        });
    }
};

function add_seat_block() {
    token = $('#token').val();
    institution_id = $('.add_institution').val();
    if (parseInt(institution_id) > 0) {
        department_id = $('.add_department').val();
        if (parseInt(department_id) > 0) {
            year = $('.add_year').val();
            if (parseInt(year) > 0) {
                cast = $('.add_cast').val();
                if (cast !== null)
                {
                    boys = $('#boys_seats').val();
                    girls = $('#girls_seats').val();
                    $.ajax({
                        type:"post",
                        url:"/admin/seatMatrix",
                        data:{
                            "_token":token,
                            "institution_id":institution_id,
                            "department_id":department_id,
                            "year":year,
                            "cast":cast,
                            "boys_seat":boys,
                            "girls_seat":girls,
                        },
                        success:function (result) {
                            swal({
                                title: "Ohhh Yesss !!!!!",
                                text: "Data Insert Successfully",
                                icon: "success",
                            });
                            refresh_table();
                        },
                        error:function (error) {

                        }
                    });
                }
                else
                {
                    swal({
                        title: "Awwww !!!!!",
                        text: "Please Select Category",
                        icon: "warning",
                    });
                }
            } else {
                swal({
                    title: "Awwww !!!!!",
                    text: "Please Select Year",
                    icon: "warning",
                });
            }
        } else {
            swal({
                title: "Awwww !!!!!",
                text: "Please Select Department",
                icon: "warning",
            });
        }
    } else {
        swal({
            title: "Awwww !!!!!",
            text: "Please Select Institution",
            icon: "warning",
        });
    }
}

function refresh_table()
{
    $('.add_list_here').empty();
    $.ajax({
        type:"GET",
        url:"/admin/getSeatMatrix",
        success:function (result) {
            data = Object.entries(result);
            console.log(data);
            for(var i =0;i<data.length;i++)
            {
                if(data[i][1].cast === 'gen')
                {
                    data[i][1].cast = "General";
                }
                else if (data[i][1].cast === 'obc')
                {
                    data[i][1].cast = "OBC";
                }
                else if (data[i][1].cast === 'sc')
                {
                    data[i][1].cast = "SC";
                }
                else if (data[i][1].cast === 'st')
                {
                    data[i][1].cast = "ST";
                }
                else
                {
                    data[i][1].cast = "Other";
                }
                $('.add_list_here').append(`<tr>
                            <th scope="row">${i+1}</th>
                            <td>${ data[i][1].institution_id }</td>
                            <td>${ data[i][1].department_id }</td>
                            <td>${ data[i][1].year }</td>
                            <td>${ data[i][1].cast }</td>
                            <td>${ data[i][1].boys_seat }</td>
                            <td>${ data[i][1].girls_seat }</td>
                            <td><i class="fa fa-trash delete_class" style="color:red;" data-id="${data[i][1].id}"></i></td>
                            </tr>`
                )
            }
        },
        error:function (error) {

        }
    });
}
