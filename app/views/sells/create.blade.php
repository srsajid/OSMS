<div class="search">
   {{ Form::select("packSelector", $packages) }}
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