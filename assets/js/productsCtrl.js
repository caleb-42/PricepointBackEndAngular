productsApp.controller("products", ["$rootScope", "$scope", 'jsonPost', 'jsonGet','$filter', function ($rootScope, $scope, jsonPost, jsonGet, $filter) {

    $rootScope.$on("selectProduct", function (evt, params) {
        console.log(params);
        $scope.history.selectedProd = params.product_name;
        $scope.history.activepane = "stocks"
    });
    
    $scope.products = {
        getprodlist : function () {
            return {
                jsonfunc: jsonGet.data('./assets/php/getlist.php',{act : 'select_operation', arg:'products'}),
                listjsOptions: {
                    valueNames: ['id','product_name', 'product_description', 'stock', 'product_retailprice', 'product_wholesaleprice', 'expiry_date'],
                    item: '<li class = "px-2 list-item" onclick = "mkactive($(this))"><div class = "rowcont"><div name = "id" class = "gone id"></div><div style = "width:20%; text-align:left !important;" name = "product_name" class="listrow pkey product_name"></div><div style = "width:25%;" class="listrow product_description" name = "product_description"></div><div style = "width:10%;" class="listrow stock" name = "stock"></div><div style =  "width:13%;" class="listrow product_retailprice" name = "product_retailprice"></div><div style = "width:17%;" class="listrow product_wholesaleprice" name = "product_wholesaleprice"></div><div style = "width:15%;" class="listrow expiry_date" name = "expiry_date"></div></div><div style = "clear:both"></div></li>'
                }
            }
        },
        prodlisthd : [
            {
                name : 'Name', 
                class : 'text-left sort div-pill', 
                datasort: 'product_name', 
                style: 'width:20%;'
            },
            {
                name : 'Description', 
                class : 'text-center sort div-pill', 
                datasort: 'product_description', 
                style: 'width:25%;'
            },
            {
                name : 'Stock', 
                class : 'text-center sort div-pill', 
                datasort: 'stock', 
                style: 'width:10%;'
            },
            {
                name : 'Retail price', 
                class : 'text-center sort div-pill', 
                datasort: 'product_retailprice', 
                style: 'width:13%;'
            },
            {
                name : 'Wholesale price', 
                class : 'text-center sort div-pill', 
                datasort: 'product_wholesaleprice', 
                style: 'width:17%'
            },
            {
                name : 'Closest expiry date', 
                class : 'text-center sort div-pill', 
                datasort: 'expiry_date', 
                style: 'width:15%;'
            }
        ]
    }


    $scope.history = {

        activepane : "none",
        stock : {
            getstocklist : function (obj) {
                console.log(obj);
                return {
                    jsonfunc: jsonGet.data('./assets/php/getlist.php',{act : 'select_operation', arg: 'stock, id, ' + obj.id})
                }
            }
        }

    }


}]);


window.jsrowTemplate = './assets/php/partials/jsrows.php?jsrow=prod';