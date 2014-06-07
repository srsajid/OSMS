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
            <col style="width: 30%">
            <col style="width: 20%">
            <col style="width: 20%">
            <col style="width: 30%">
        </colgroup>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </table>
</div>