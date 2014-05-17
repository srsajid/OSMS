<div class="head">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand">Title</a>
        </div>
        <div>
            <div class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
                <button type="button" class="btn btn-default btn-sm create-category" title="Create Category">
                    <span class="glyphicon glyphicon-camera"></span>
                </button>
            </div>
        </div>
    </nav>
</div>

<div class="body">
    <table class="table">
        <colgroup>
            <col style="width: 30%">
            <col style="width: 30%">
            <col style="width: 30%">
            <col style="width: 10%">
        </colgroup>
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $products->each(function($product){ ?>
            <tr class="active">
                <td><?php echo $product->id; ?></td>
                <td><?php echo $product->name; ?></td>
                <td><?php  ?></td>
                <td>
                    <button type="button" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-camera"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-camera"></span>
                    </button>
                    <button type="button" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-camera"></span>
                    </button>
                </td>
            </tr>
        <?php }); ?>
        </tbody>
    </table>
</div>
