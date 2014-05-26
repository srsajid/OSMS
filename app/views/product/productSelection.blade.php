<form class="create-edit-form">
    <div class="two-column">
        <div class="column first-column">
            <div class="content">
                <table>
                   <colgroup>
                       <col style="width: 30%"/>
                       <col style="width: 80%"/>
                   </colgroup>
                    <tr>
                        <th></th>
                        <th>Name</th>
                    </tr>
                    <tbody>
                        <?php $products->each(function($product){?>
                            <tr>
                                <td class="action">
                                    <input type="checkbox" value="{{$product->id}}" class="selector">
                                </td>
                                <td class="name">{{$product->name}}</td>
                            </tr>
                        <?php });?>
                    </tbody>
                </table>
                <div class="footer">
                    <?php echo CommonService::paginator($max, $offset, $total); ?>
                </div>
            </div>

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
</form>
