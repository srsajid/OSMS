
<form class="form-horizontal" role="form" action="admission/save" method="post" enctype="multipart/form-data">
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
    <input type="file" name="student_image">
    <input type="file" name="father_image">
    <input type="file" name="mother_image">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Student ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" style="text-transform: uppercase" name="student_ID" placeholder="Student ID">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Student Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="student_name" placeholder="Student Name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Fathers Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="father_name" placeholder="Fathers Name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Mothers Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="mother_name" placeholder="Mothers Name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Guardian Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="guardian_name" placeholder="Mothers Name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Date of Birth</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="datepicker" name="date_birth" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-10">
            <select class="form-control" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Nationality</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nationality" placeholder="Nationality">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Religion</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="religion" placeholder="Religion">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Correspondence Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address" placeholder="Address">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="contact_number" placeholder="Contact Number">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Transport</label>
        <div class="col-sm-10">
            <select class="form-control" name="transport">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Recommended to Class</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="clazz" placeholder="Class">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Section</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="section" placeholder="Class">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Shift</label>
        <div class="col-sm-10">
            <select class="form-control" name="shift">
                <option value="Morning">Morning</option>
                <option value="Day">Day</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Relative SID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="rsidn" placeholder="Relative SID">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Relative Student Class</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="rsidclass" placeholder="Relative Student Class">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Relative Student Section</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="rsidsection" placeholder="Relative Student Section">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Transport Fee</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="transportfee" placeholder="Transport Fee">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </div>
</form>
