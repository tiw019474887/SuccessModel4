/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('ProjectStatusAdmin', ['ui.router','AppConfig','angularify.semantic', 'flow', 'ProjectStatus']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/projectStatus/_home.html",
            controller: "HomeCtrl",
            resolve: {
                statuses: function (ProjectStatusService) {
                    return ProjectStatusService.all();
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope, $state, statuses) {
    console.log("HomeCtrl Start...");

    $scope.statuses = statuses.data;

});
