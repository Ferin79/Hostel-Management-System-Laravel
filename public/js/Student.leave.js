window.onload = function () {
    dateFormatter();
    $("#addleave").submit(function (e) {
        e.preventDefault();
        $.ajax({
            method: 'GET',
            url: '/student/addLeave',
            data: {
                reason: $('#reason').val(),
                startfrom: $('#startdate').val(),
                contact: $('#contact').val(),
                duration: $('#duration').val()
            },
            success: function (result) {
                console.log(result);
            },
            error: function (error) {
                console.log(error);
            }
        });
    })
};
const dateFormatter = () => {
    $(document).ready(function () {
        $("#startdate").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: 1,
            startDate: new Date(),
            todayHighlight: true,
            //endDate: new Date()
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#enddate').datepicker('setStartDate', minDate);
            $(this).datepicker('hide');
        });

        $("#enddate").datepicker({
            format: 'dd/mm/yyyy',
            todayHighlight: false,
        }).on('changeDate', function (selected) {
            $(this).datepicker('hide');
            var start= $("#startdate").datepicker("getDate");
            var end= $("#enddate").datepicker("getDate");
            days = (end- start) / (1000 * 60 * 60 * 24);
            $('#duration').val(Math.round(days));
        });
    });
}
