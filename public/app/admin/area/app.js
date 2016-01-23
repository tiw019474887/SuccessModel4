
var app = angular.module('AreaAdmin', ['ui.router', 'ngCookies', 'AppConfig', 'angularify.semantic', 'flow','Area', 'Faculty',
    'User','openlayers-directive','uiGmapgoogle-maps'])
    .config(function(uiGmapGoogleMapApiProvider) {
    uiGmapGoogleMapApiProvider.configure({
        key: 'AIzaSyCyb1w6ezK3C0k64_1AiB0vK-qjmQkCrcI',
        v: '3.20', //defaults to latest 3.X anyhow
        libraries: 'weather,geometry,visualization'
    });
});


app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/area/_home.html",
            controller: "HomeCtrl",
            resolve: {
                areas: function (AreaService) {
                    return AreaService.all();
                }
            }
        })
        .state('add', {
            url: "/",
            templateUrl: "/app/admin/area/_add.html",
            controller: "AddCtrl",
            resolve: {
                area: function (AreaService) {
                    return {data: {}}
                }
            }
        })
        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/admin/area/_edit.html",
            controller: "EditCtrl",
            resolve: {
                area: function (AreaService, $stateParams) {
                    return AreaService.getID($stateParams.id)
                }
            }
        })
        .state('test', {
            url: "/",
            templateUrl: "/app/admin/area/_test.html",
            controller: "AddCtrl",
            resolve: {
                area: function (AreaService) {
                    return {data: {}}
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope, $state, areas,$timeout ,AreaService) {
    console.log("HomeCtrl Start...");

    $scope.areas = areas.data;
    $scope.area = {};
    $scope.delete_modal = false;

    $scope.showDeleteModal = function (area) {
        $scope.area = area;
        $scope.delete_modal = true;
    }

    $scope.closeDeleteModal = function () {
        $scope.delete_modal = false;
    }

    $scope.ajaxDelete = function (area, bool) {
        $scope.area = area;
        if (bool) {
            AreaService.delete(area).success(function (response) {
                $scope.closeDeleteModal();
                AreaService.all().success(function (response) {
                    $scope.areas = response;
                })
            });
        } else {
            $scope.closeDeleteModal();
        }

    }

    $timeout(doPopup,200);

});

app.controller("AddCtrl", function ($scope, $state, area, AreaService) {
    console.log("AddCtrl Start...");
    $scope.area = area.data;
    $scope.map = { center: { latitude: 45, longitude: -73 }, zoom: 8 };

    $scope.save = function () {
        AreaService.addArea($scope.area).success(function (resposne) {
            $state.go('home');
            //$state.go("edit",{id:resposne.id});
        }).error(function (response) {
            alert(response.name);
        });
    }
});

app.controller("EditCtrl", function ($scope, $state, area, AreaService) {
    console.log("EditCtrl Start...");
    $scope.area = area.data;


    $scope.save = function () {
        AreaService.save($scope.area).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            alert(response.name_th);
        });
    }



});