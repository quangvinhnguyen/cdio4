/**
 * Created by vinh on 9/14/2016.
 */
var app = angular.module('minmax',['ngRoute'],function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});


app.controller('DanhmucCtrl',function ($scope,$http, $location,$sce) {

    var url = $location.$$absUrl;
    var spliturl = url.split("=");
    var id = spliturl[spliturl.length-1];
    $scope.posts = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];
    $scope.getlistingproduct = function(pageNumber){
        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        $http.get('./datalistingproduct/'+id+'?page='+pageNumber).success(function (response) {
            // $scope.datas = response;
            $scope.datas        = response.data;
            $scope.totalPages   = response.last_page;
            $scope.currentPage  = response.current_page;
            // Pagination Range
            var pages = [];

            for (var i = 1; i <= response.last_page; i++) {
                pages.push(i);
            }
            $scope.range = pages;
        })


    },
        $scope.muahang = function (id) {


            $http.get('./mua-hang/'+id).success(function (data) {


                $(".cart").load(location.href+" .cart");
            })

        }
});

app.controller('SearchCtrl',function ($scope,$http, $location,$sce) {

    var url = $location.$$absUrl;
    var spliturl = url.split("search=");
    var id = spliturl[spliturl.length-1];
    $scope.posts = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];
    $scope.getsearch = function(pageNumber){
        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        $http.get('search/'+id+'?page='+pageNumber).success(function (response) {



            $scope.datas        = response.data;
            $scope.totalPages   = response.last_page;
            $scope.currentPage  = response.current_page;
            // Pagination Range
            var pages = [];

            for (var i = 1; i <= response.last_page; i++) {
                pages.push(i);
            }
            $scope.range = pages;


        })

    },
        $scope.muahang = function (id) {


            $http.get('./mua-hang/'+id).success(function (data) {


                $(".cart").load(location.href+" .cart");
            })

        }
});
app.controller('SanphamCtrl',function ($scope,$http, $location,$sce) {


    var url = $location.$$absUrl;
    var spliturl = url.split("=");
    var id = spliturl[spliturl.length-1];
    $scope.posts = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];

    $scope.getajax = function(pageNumber) {
        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        $http.get('AjaxIndex'+ '?page=' + pageNumber).success(function (response) {
            // $scope.datas = response;
            $scope.datas        = response.data;
            $scope.totalPages   = response.last_page;
            $scope.currentPage  = response.current_page;
            // Pagination Range
            var pages = [];

            for (var i = 1; i <= response.last_page; i++) {
                pages.push(i);
            }
            $scope.range = pages;
        })

    },  $scope.getdetailhinh = function () {
        $http.get('./hinh/'+id).success(function (data) {

            $scope.data = data;
        })


    }
        ,
        $scope.getdetail = function () {

            $http.get('./detail/'+id).success(function (data) {

                $scope.datas = data;
            })


        },
        $scope.trustAsHtml = function(string) {
            return $sce.trustAsHtml(string);
        }
        ,
        $scope.muahang = function (id) {


            $http.get('./mua-hang/'+id).success(function (data) {


                 $(".cart").load(location.href+" .cart");
            })

        }





});
app.directive('postsPagination', function(){
    return{
        restrict: 'E',
        template: '<ul class="pagination">'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getajax(1)">«</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getajax(currentPage-1)">‹ Prev</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
        '<a href="javascript:void(0)" ng-click="getajax(i)">{{i}}</a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getajax(currentPage+1)">Next ›</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getajax(totalPages)">»</a></li>'+
        '</ul>'
    };
});
app.directive('postsPaginations', function(){
    return{
        restrict: 'E',
        template: '<ul class="pagination">'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getlistingproduct(1)">«</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getlistingproduct(currentPage-1)">‹ Prev</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
        '<a href="javascript:void(0)" ng-click="getlistingproduct(i)">{{i}}</a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getlistingproduct(currentPage+1)">Next ›</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getgetlistingproductajax(totalPages)">»</a></li>'+
        '</ul>'
    };
});
app.directive('postsPaginationt', function(){
    return{
        restrict: 'E',
        template: '<ul class="pagination">'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getsearch(1)">«</a></li>'+
        '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getsearch(currentPage-1)">‹ Prev</a></li>'+
        '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
        '<a href="javascript:void(0)" ng-click="getsearch(i)">{{i}}</a>'+
        '</li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getsearch(currentPage+1)">Next ›</a></li>'+
        '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getsearch(totalPages)">»</a></li>'+
        '</ul>'
    };
});



