<div class="search">
    <div style="" class="navbar-form navbar-left">
        <div class="form-group">
            {{ Form::select("packSelector", $packages) }}
        </div>
    </div>
    <div  class="navbar-form navbar-right search-area">
        <div class="form-group">
            <input type="text" name="searchText" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default search">Search</button>
    </div>

</div>
<div class="selection-table-container">

</div>
<div class="sells-item-table-container">
    <table class="srui-table">
        <colgroup>
            <col style="width: 20%">
            <col style="width: 20%">
            <col style="width: 20%">
            <col style="width: 20%">
            <col style="width: 20%">
        </colgroup>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <tr class="last-row">
            <td colspan="3">Total</td>
            <td class="grand-total" colspan="2"></td>
        </tr>
    </table>
</div>
<div class="form-group">
    <div class="col-sm-offset-10 col-sm-2" style="margin-top: 10px">
        <button type="submit" class="btn btn-default sells-create-btn" style="padding: 8px 25px">Create</button>
    </div>
</div>