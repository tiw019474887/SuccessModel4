/**
 * Created by tiwter on 6/10/2015.
 */


var app = angular.module('FacultyProject', ['ui.router', 'AppConfig','Faculty']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/faculty/project/_home.html",
            controller: "HomeCtrl",
            resolve: {
                projects: function (FacultyService) {
                    return FacultyService.getProjects();
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope,projects) {
    console.log("HomeCtrl Start...");
    $scope.projects = projects.data;


});


