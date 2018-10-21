app.directive('jslist', ['List', '$rootScope', function (List, $rootScope) {
    return {
        restrict: 'E',
        template: '<ul ng-click = "digestCycle()" class = "list" ></ul>',
        scope: {
            getlistfunc: '&'
        },
        link: function (scope, element, attrs) {
            $.fn.serializeAnyObject = function () {
                var formData = {};
                for (var i = 0, n = this.length; i < n; ++i){
                    /* console.log($(this[i]).attr('name'), $(this[i]).html()); */
                    formData[$(this[i]).attr('name')] = $(this[i]).html();
                }
                return formData;
            };
            scope.jslist = {
                createList: function () {
                    $(".list").empty();
                    listdetails = scope.getlistfunc();
                    jsonlist = listdetails.jsonfunc;
                    listoptions = listdetails.listjsOptions;
                    jsonlist.then(function (result) {
                        console.log(result);
                        values = result;
                        mylist = List.createNew(attrs.listid, listoptions, values);
                    });

                    mkactive = function (obj) {
                        $("li.actparent").toggleClass("actparent");
                        $(obj).toggleClass("actparent");
                        obj = obj.find(attrs.listrow);
                        json = obj.serializeAnyObject();
                        $rootScope.$emit(attrs.selectevt,json);
                    }
                },
                toggleOut: function () {
                    $(".list").fadeOut(200);
                },
                toggleIn: function () {
                    $(".list").delay(500).fadeIn(200);
                },
            }
            scope.jslist.createList();
            $rootScope.$on('recreatejslist', function(evt, params){
                scope.jslist.toggleOut();
                scope.jslist.createList();
                scope.jslist.toggleIn();
            });
        }
    };
}]);

app.directive('jsrow', ['$rootScope', function ($rootScope) {
    return {
        restrict: 'A',
        templateUrl: window.jsrowTemplate,
        scope: {
            getrowfunc: '&',
            type : '='
        },
        link: function (scope, element, attrs) {
            console.log(scope.type);
            $rootScope.$on(attrs.selectedevt, function(evt, params){
                console.log(params);
                scope.activerow = params;
                rowdetails = scope.getrowfunc({obj : params});
                jsonrow = rowdetails.jsonfunc;
                jsonrow.then(function (result) {
                    console.log(result);
                    scope.rowlist = result;
                });
            });
            
            scope.mkactive = function (evt) {
                console.log(evt.currentTarget);
                obj = $(evt.currentTarget).find('td');
                json = obj.serializeAnyObject();
                console.log(json, $(evt.currentTarget).hasClass('actparent'));
                $(evt.currentTarget).hasClass('actparent') ? $rootScope.$emit(attrs.selectevt,json) : null;
                $("tr.actparent").css("background-color", "#1C6A82");
                $("tr.actparent").toggleClass("actparent");
                $(evt.currentTarget).css("background-color", "rgba(0,0,0, .5)");
                $(evt.currentTarget).toggleClass("actparent"); 
            }
        }
    };
}]);

app.directive('modalentry', ['$rootScope', 'jsonPost', function ($rootScope, jsonPost, $filter) {
    return {
        restrict: 'A',
        //template: modalTemplate,
        templateUrl: './assets/php/partials/modals.html',
        scope: false,
        link: function (scope, element, attrs) {

            $.fn.serializeObject = function () {
                var formData = {};
                var formArray = this.serializeArray();

                for (var i = 0, n = formArray.length; i < n; ++i){
                    if(formArray[i].value != ""){
                        formData[formArray[i].name] = formArray[i].value;
                    }
                }

                return formData;
            };
            loadJson2Form = function (json, cont) {
                for (var key in json) {
                    if(key != "$$hashKey")
                    $(cont + " input[name = " + key + "]").val(json[key]);
                    $(cont + " textarea[name = " + key + "]").val(json[key]);
                }
            }
            $('.modal').on("shown.bs.modal", function () {
                if ($rootScope.settings.modal.name == "Update Product") {
                    console.log(scope.products.selected);
                    loadJson2Form(scope.products.selected, '.inpRead');
                }
            });
            updateProduct = function () {
                $rootScope.settings.modal.adding = true
                jsonForm = $(".updateProductForm").serializeObject();
                scope.products.updateProduct(jsonForm);
            };
            addProduct = function () {
                $rootScope.settings.modal.adding = true
                jsonForm = $(".addProductForm").serializeObject();
                scope.products.addProduct(jsonForm);
            };
            $rootScope.settings.modal.close = function () {
                $(".report").fadeIn(100, function () {
                    $(".report").delay(1500).fadeOut(100, function(){
                        $(".modal .close").trigger("click");
                        $rootScope.settings.modal.msg = "";
                        $(".modal input").val("");
                    });
                });
            }
            $rootScope.settings.modal.fademsg = function(){
                console.log('dvs');
                $(".report").fadeIn(50, function(){
                    $('.report').delay(3500).fadeOut(10);
                });
            };
            $('.modal').on('hidden.bs.modal', function(){
                $rootScope.settings.modal.msg = '';
                $rootScope.settings.modal.active = "";
            });
            $('.modal .close').on('click', function(){
                $rootScope.settings.modal.msg = '';
                $rootScope.settings.modal.active = "";
            });

        }
    };
}]);