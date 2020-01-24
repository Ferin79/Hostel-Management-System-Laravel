window.onload = function () {
    document.querySelector('#register-request').addEventListener('click',function () {
        window.location.href = '/admin/pending';
    });
    document.querySelector('#manage-admin').addEventListener('click',function () {
        window.location.href = '/admin/manage-admin';
    });
    document.querySelector("#manage-student").addEventListener('click',function () {
        window.location.href = '/admin/manage-student';
    });
    document.querySelector('#add_room').addEventListener('click',function () {
        window.location.href = '/admin/add-room';
    });
    document.querySelector('#showRoom').addEventListener('click',function () {
        window.location.href = '/showRooms';
    });
    document.querySelector('#edit_dept').addEventListener('click',function () {
            window.location.href = '/admin/edit-dept';
    });
    document.querySelector('#apply_stu').addEventListener('click',function () {
            window.location.href = '/admin/studentApply';
    });
    document.querySelector('#edit_seat').addEventListener('click',function () {
        window.location.href = "/admin/edit-seat-matrix";
    })
};
