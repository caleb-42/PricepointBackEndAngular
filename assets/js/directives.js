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
            $rootScope.jslist = {
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
                }
            }
            $rootScope.jslist.createList();
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
                $("tr.actparent").css("background-color", "#1C6A82");
                $("tr.actparent").toggleClass("actparent");
                $(evt.currentTarget).css("background-color", "rgba(0,0,0, .5)");
                $(evt.currentTarget).toggleClass("actparent"); 
                obj = $(evt.currentTarget).find('td');
                json = obj.serializeAnyObject();
                console.log(json);
                $rootScope.$emit(attrs.selectevt,json);
            }
        }
    };
}]);