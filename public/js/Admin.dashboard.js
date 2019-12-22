window.onload = function () {
    document.querySelector('#register-request').addEventListener('click',function () {
        window.location.href = '/admin/pending';
    });
    document.querySelector('#manage-admin').addEventListener('click',function () {
        window.location.href = '/admin/manage-admin';
    });
    document.querySelector("#manage-student").addEventListener('click',function () {
        window.location.href = '/admin/manage-student';
    })
};
