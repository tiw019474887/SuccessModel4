/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('AreaAdmin', ['ui.router', 'ngCookies', 'AppConfig', 'angularify.semantic', 'flow', 'Area', 'User','Faculty']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/area/_home.html",
            controller: "HomeCtrl",
            resolve: {
                faculties: function (FacultyService) {
                    return FacultyService.all();
                }
            }
        })
        .state('add', {
            url: "/add",
            templateUrl: "/app/admin/area/_add.html",
            controller: "AddCtrl",
            resolve: {
                faculty: function (AreaService) {
                    return {data: {}}
                }
            }
        })

});

app.controller("HomeCtrl", function ($scope,area) {
    console.log("HomeCtrl Start...");

    $scope.area = area.data;
    $scope.area = {};
    $scope.delete_modal = false;

    $scope.showDeleteModal = function (faculty) {
        $scope.faculty = faculty;
        $scope.delete_modal = true;
    }

    $scope.closeDeleteModal = function () {
        $scope.delete_modal = false;
    }
});

app.controller("AddCtrl", function ($scope, $state,area, AreaService) {
    console.log("AddCtrl Start...");

    $scope.area = area.data;

    $scope.save = function () {
        AreaService.addArea($scope.area).success(function (resposne) {
            $state.go('home');
            //$state.go("edit",{id:resposne.id});
        }).error(function (response) {
            alert(response.name_th);
        });
    }
});

