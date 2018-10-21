var app = angular.module('app', ['ngAnimate', 'ngRoute', 'ngSanitize', 'productsApp', 'usersApp', 'customersApp', 'recordsApp']);

app.controller("appctrl", ["$rootScope", "$scope", function ($rootScope, $scope) {
    $rootScope.settings = {
        emitter: function(evt, param){
            $rootScope.$emit(evt, param);
        },
        modal: {
            active: "",
            name: "",
            size: "",
            msg: "",
            msgprompt: function (arr) {
                if (typeof (arr) == "string") {
                    $rootScope.settings.modal.msg = "BACKEND CODE ERROR";
                    $rootScope.settings.modal.msgcolor = "choral";
                    $rootScope.settings.modal.adding = false;
                    $rootScope.settings.modal.fademsg();
                } else {
                    $rootScope.settings.modal.msg = arr[1];
                    if(arr[0] == "output"){
                        $rootScope.settings.modal.msgcolor = "green";
                        $rootScope.settings.modal.close();
                    }else{
                        $rootScope.settings.modal.msgcolor = "choral";
                        $rootScope.settings.modal.fademsg();
                    }
                    $rootScope.settings.modal.adding = false;
                }
            }
        },
        userDefinition: function (user, role) {
            $rootScope.settings.user = user;
            $rootScope.settings.role = role;
        },
        user: "",
        role: "",
        log: true
    }
    $scope.sidebarnav = {
        navig: {
            activeNav: "Dashboard",
            mkactiveNav: function (nav) {
                $scope.sidebarnav.navig.activeNav = nav;
            },
            navs: [
                {
                    name: "Dashboard",
                    href: "#dash",
                    imgurl: "./assets/img/dashicon-01.png"
                },
                {
                    name: "Products",
                    href: "#dash",
                    imgurl: "./assets/img/products_icon.png"
                },
                {
                    name: "Users",
                    href: "#dash",
                    imgurl: "./assets/img/user_icon.png"
                },
                {
                    name: "Customers",
                    href: "#dash",
                    imgurl: "./assets/img/customer_icon.png"
                },
                {
                    name: "Records",
                    href: "#dash",
                    imgurl: "./assets/img/record_icon.png"
                },
                {
                    name: "Log Out",
                    href: "#dash",
                    imgurl: "./assets/img/logicon-01.png"
                },
                
            ]
        },
        menuicon: {
            active:false,
            toggleactive: function () {
                console.log("rertr");
                $scope.sidebarnav.menuicon.active = $scope.sidebarnav.menuicon.active ? false : true;
            }
        }
    }
}]);

var productsApp = angular.module('productsApp', []);
var usersApp = angular.module('usersApp', []);
var customersApp = angular.module('customersApp', []);
var recordsApp = angular.module('recordsApp', []);
