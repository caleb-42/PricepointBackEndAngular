<?php 

session_start();
print (isset($_SESSION['user']));
$_SESSION['user_name'] = 'webplay';
$_SESSION['role'] = 'admin';
if(!isset($_SESSION['user_name'])){
   // header("Location: logIn.php");
}

$templates = ["Dashboard"=>"./assets/php/partials/dashboard.php","Products"=>"./assets/php/partials/products.php","Users"=>"./assets/php/partials/users.php","Customers"=>"./assets/php/partials/customers.php","Records"=>"./assets/php/partials/records.php"]
?>

<!doctype html>
<html ng-app="app">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restaurant &amp; Bar</title>

    <!-- Angular core -->
    <script src="./vendors/angular/angular.min.js"></script>
    <script src="./vendors/angular/angular-route.min.js"></script>
    <script src="./vendors/angular/angular-animate.min.js"></script>
    <script src="./vendors/angular/angular-sanitize.min.js"></script>
    <script src="./vendors/angular/ui-bootstrap-tpls-2.5.0.min.js"></script>

    <!-- jQueryui core -->
    <script src="./vendors/jquery/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="./vendors/jquery-ui-1.12.1/jquery-ui.css">
    <script src="./vendors/jquery-ui-1.12.1/jquery-ui.js"></script>

    <!-- Bootstrap core-->
    <link rel="stylesheet" href="./vendors/bootstrap4-alpha/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendors/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="./vendors/bootstrap4-alpha/js/bootstrap.min.js"></script>

    <!-- Hamburger css -->
    <link href="./vendors/hamburgers/dist/hamburgers.css" rel="stylesheet">
    <link href="./vendors/Hover/css/hover.css" rel="stylesheet">

    <!-- list core js -->
    <script src="./vendors/List/List.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/css/index.css" rel="stylesheet">
    <link href="./assets/css/utilities.css" rel="stylesheet">
    <link href="./assets/css/ng-animation.css" rel="stylesheet">
    <link href="./assets/css/utilities.css" rel="stylesheet">

    <!-- Custom scripts for this template -->
    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/filters.js"></script>
    <script src="./assets/js/services.js"></script>
    <script src="./assets/js/directives.js"></script>
    <script src="./assets/js/productsCtrl.js"></script>
    <script src="./assets/js/usersCtrl.js"></script>
    <script src="./assets/js/customersCtrl.js"></script>
    <script src="./assets/js/recordsCtrl.js"></script>
    <script src="./assets/js/dashboardCtrl.js"></script>
    
</head>

<body>
<div id = "wrapper" class="anim" ng-controller="appctrl" ng-class = "{'toggled' : sidebarnav.menuicon.active}">
        <div id = "sidebar"  class="anim">

            <div class="d-inline-flex d-flex float-right float-sm-left" ng-click="sidebarnav.menuicon.toggleactive()">
                <p id="dataToggler" class="mx-sm-3 my-sm-4 mr-5 mt-3 p-sm-1 hamburger hamburger--minus"  ng-class="{'is-active':sidebarnav.menuicon.active}">
                    <a href="#">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </a>
                </p>
            </div>

            <div class="mynav">
                <div id="navmenu" class="w-100 mt-sm-2 d-inline-flex flex-column">
                    <a ng-repeat = "nav in sidebarnav.navig.navs"   ng-click = "sidebarnav.navig.mkactiveNav(nav.name)" id = "{{nav.name}}" class="relatv mb-sm-4 {{sidebarnav.navig.activeNav == nav.name ? 'active' : null}} d-flex anim" style = "width:250px;" href="{{nav.href}}">
                            <img src="{{nav.imgurl}}">
                            <span class="{{sidebarnav.menuicon.active ? 'd-block' : 'gone'}} ml-3 anim my-auto menunames">{{nav.name}}</span>
                    </a>
                </div>
            </div>
        </div>
        
        <div id="main"  class="container-fluid nopadding" >
            
            <nav class="navbar py-3 px-sm-4 d-flex flex-row justify-content-between boxshod" >
                    <div class="d-inline-flex d-flex float-right float-sm-left">
                        <h1 class="ml-sm-4 align-self-center" style="font-size: 1.8rem; font-weight:600;">PricePoint Pharmacy Admin</h1>
                    </div>

                    <div class="row mr-5">
                        <img class="rounded-circle mr-2 align-self-center" src="assets/img/avatar.png">
                        <h6 class="align-self-center font-weight-bold adminref"><?php echo $_SESSION['user_name']; ?></h6>
                        <a id="logout" href="assets/php/logout.php"><button class = "btn ml-4 btn-purp">
                            Log out
                            </button></a>
                    </div>
            </nav>

            <div class="" id="tabs" ng-switch on="sidebarnav.navig.activeNav">
                <?php foreach($templates as $key => $value): ?>
                <div class  = "<?php echo $key ?>" ng-switch-when = "<?php echo $key; ?>">
                    <div ng-include ng-init = "settings.userDefinition('<?php echo $_SESSION['user_name']; ?>', '<?php echo $_SESSION['role']; ?>');" src = "'<?php echo $value; ?>'"></div>
                </div>
                <!--  -->
                <?php endforeach;?>
            </div>  
        </div>
    </div>

</body>

</html>
