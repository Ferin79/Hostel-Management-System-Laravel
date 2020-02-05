<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="m-4" id="addleave">
                <div class="form-group">
                    <label for="reason">Reason:</label>
                    <textarea class="form-control" required id="reason" placeholder="Describe Your Reason for Leave" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="contact">Emergency Contact No:</label>
                    <input type="tel" class="form-control" id="contact" required placeholder="Enter Contact Number"/>
                </div>
                <div class="form-group">
                    <label for="startdate">Start Date:</label>
                    <br>
                    <input class="datepicker" id="startdate" required />
                </div>
                <div class="form-group">
                    <label for="enddate">End Date:</label>
                    <br>
                    <input class="datepicker" id="enddate" required />
                </div>
                <div class="form-group">
                    <label>Duration:</label>
                    <input class="form-control" id="duration" value="0" required readonly />
                </div>
                <div class="btn_wrapper">
                    <button class="btn btn-success" type="submit">Request Leave</button>
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
