window.onload = function() {
    document.querySelector('#edit_profile').addEventListener('click',function () {
        window.location.href = '/student/profile';
    });
    document.querySelector('#apply_now').addEventListener('click',function () {
        window.location.href = '/student/apply';
    });
    document.querySelector('#leave_request').addEventListener('click',function () {
        window.location.href = '/student/leave';
    });
};
