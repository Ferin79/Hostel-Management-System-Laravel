<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Student Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 id="name">Name: </h3>
                <h5 id="email">Email: </h5>
                <h5 id="number">Number: </h5>
                <hr />
                <h6 id="address">Address: </h6>
                <hr />
                <h6 id="cast">Cast: </h6>
                <hr />
                <h6 id="passout">Passout Degree: </h6>
                <h6 id="marks">Marks: </h6>
                <h6 id="department">Department: </h6>
                <h6 id="sem">Semester: </h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $('.showData').click(function () {
            $('.show_details').submit(function (e) {
                e.preventDefault();
            });
            var myClass = $(this).attr("class");
            var data = myClass.split(' ');
            var id = data[data.length-1];

            $.ajax({
                type:'GET',
                url: `getUser/${id}`,
                success: function (data) {
                    data = Object.entries(data);
                    console.log(data);

                    $('#name').empty();
                    $('#email').empty();
                    $('#number').empty();
                    $('#address').empty();
                    $('#cast').empty();
                    $('#passout').empty();
                    $('#marks').empty();
                    $('#department').empty();
                    $('#sem').empty();

                    $('#name').append('Name: '+data[0][1].first_name);
                    $('#name').append(" "+data[0][1].last_name);
                    $('#email').append("Email: "+data[0][1].email);
                    $('#number').append("Contact No: "+data[0][1].number);

                    $('#address').append("Address: "+data[1][1].lane1);
                    $('#address').append(" "+data[1][1].lane2);
                    $('#address').append(" "+data[1][1].lane3);
                    $('#address').append(" "+data[1][1].city);
                    $('#address').append(" "+data[1][1].state);
                    $('#address').append(" "+data[1][1].pincode);

                    $('#cast').append("Cast: "+data[1][1].cast);

                    $('#passout').append("Passout: "+data[1][1].degree);
                    $('#marks').append("Marks: "+data[1][1].marks);
                    $('#department').append("Department: "+data[1][1].department);
                    $('#sem').append("Sem: "+data[1][1].sem);

                },
                error: function () {

                }
            });
        })
    }
</script>
