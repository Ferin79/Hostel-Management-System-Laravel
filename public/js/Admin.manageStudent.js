window.onload = function () {

    $('.accept_acc').submit(function (e) {
        e.preventDefault();
        swal({
            title: "Good job!",
            text: "The Account has been Accepted",
            icon: "success",
            button: "Aww yiss!",
        });
        $(this).unbind('submit').submit();

    })
    $('.delete_acc').submit(function (e) {
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Account !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).unbind('submit').submit();
                    swal("Poof! Account Has been deleted", {
                        icon: "success",
                    });
                } else {
                    e.preventDefault();
                }
            });
    });

    $('.block_acc').submit(function (e) {
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Block Accounts will be visible inside Pending Register Request Page",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).unbind('submit').submit();
                    swal("Poof! Account Has been Blocked", {
                        icon: "success",
                    });
                } else {
                    e.preventDefault();
                }
            });
    })
};
