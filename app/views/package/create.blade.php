<form class="create-edit-form" action="<?php echo OSMS::$baseUrl;?>package/save" method="post">
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control validate[required]" placeholder="Package Name">
        </div>
    </div>
    <div class="two-column">
        <div class="column first-column">


        </div><div class="column last-column">
            <div class="content">
                <table>
                    <colgroup>
                        <col style="width: 80%"/>
                        <col style="width: 20%"/>
                    </colgroup>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-10 col-sm-2">
            <button type="submit" class="btn btn-default">Create</button>
        </div>
    </div>
</form>
