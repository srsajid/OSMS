<!DOCTYPE html>
<html>
<head>
    <title>School Management application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/validation/validationEngine.jquery.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap.icon-large.min.css" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/app/base-style.css" rel="stylesheet">
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/App/App.js"></script>
    <script src="js/App/utility/form.jquery.js"></script>
    <script src="js/App/utility/util.js"></script>
    <script src="js/App/utility/prototype.js"></script>
    <script src="js/validation/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/validation/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/App/utility/form.js"></script>
    <script src="js/App/utility/srui-tabs.js"></script>
    <script src="js/App/utility/ui.js"></script>

    <script src="js/App/utility/TableTab.js"></script>
    <script src="js/App/tabs/product-tab.js"></script>
    <script src="js/App/tabs/category-tab.js"></script>
    <script src="js/App/tabs/package-tab.js"></script>
    <script src="js/App/tabs/Sells-tab.js"></script>

</head>

<body>
    <div id="admin-panel-container">
        <div class="container-fluid">
            <div class="row navigation">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="">SMA</a>
                    </div>
                    <div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a>Item 1</a></li>
                            <li><a>Item 2</a></li>
                            <li><a>Item 3</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="row ribbon">
                <div class="ribbon-menu-btn-container">
                    <button type="button" class="btn btn-default btn-lg ribbon-menu-btn" tab-id="product">
                        <span class="glyphicon glyphicon-briefcase"></span> Product
                    </button>

                    <button type="button" class="btn btn-default btn-lg ribbon-menu-btn" tab-id="category">
                        <span class="glyphicon glyphicon-adjust"></span> Category
                    </button>
                    <button type="button" class="btn btn-default btn-lg ribbon-menu-btn" tab-id="package">
                        <span class="icon-large icon-gift"></span> Package Product
                    </button>

                    <button type="button" class="btn btn-default btn-lg ribbon-menu-btn" tab-id="sells">
                        <span class="glyphicon-barcode"></span> Sells
                    </button>

                    <button type="button" class="btn btn-default btn-lg ribbon-menu-btn" tab-id="admission">
                        <span class="glyphicon glyphicon-user"></span> Admission
                    </button>

                </div>
            </div>
            <div class="row body" style="margin-top: 20px">
                <div id="tabs">
                    <div class="main-tab-header-container">
                        <ul class="header-list">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/bootstrap.js"></script>

</body>
</html>