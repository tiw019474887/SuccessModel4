/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('AreaAdmin', ['ui.router', 'ngCookies', 'AppConfig', 'angularify.semantic', 'flow','Area', 'Faculty',
    'User','openlayers-directive','uiGmapgoogle-maps']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/area/_home.html",
            controller: "HomeCtrl",
            resolve: {
                areas: function (AreaService) {
                    return AreaService.index();
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

app.controller("HomeCtrl", function ($scope, $state, areas, AreaService) {
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
            AreaService.delete(areas).success(function (response) {
                $scope.closeDeleteModal();
                AreaService.all().success(function (response) {
                    $scope.areas = response;
                })
            });
        } else {
            $scope.closeDeleteModal();
        }

    }


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