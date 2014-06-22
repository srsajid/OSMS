<div class="head">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand">Products</a>
        </div>
        <div>
            <div class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" name="searchText" class="form-control" placeholder="Search" value="">
                </div>
                <button type="submit" class="btn btn-default search">Search</button>
                <button type="button" class="btn btn-default btn-sm tool-icon create-sells" title="Create Sells">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </button>
            </div>
        </div>
    </nav>
</div>

<div class="body">
    <table class="table">
        <colgroup>
            <col style="">
            <col style="">
            <col style="">
            <col style="">
        </colgroup>
        <tr>
            <th>Id</th>
            <th>Total</th>
            <th>Date</th>
            <th>Sells By</th>
            <th>Actions</th>
        </tr>
        <?php $sells->each(function($sell){ ?>
            <tr>
                <td><?php echo $sell->id;?></td>
                <td><?php echo $sell->getTotal();?></td>
                <td><?php echo $sell->created_at; ?></td>
                <td><?php echo $sell->user->username; ?></td>
                <td></td>
            </tr>
        <?php }); ?>

    </table>
</div>
<div class="footer">
    <?php
    echo CommonService::paginator($max, $offset, $total);
    echo CommonService::itemPerPage($max);
    ?>
</div>
