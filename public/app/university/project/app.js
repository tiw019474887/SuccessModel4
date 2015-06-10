/**
 * Created by tiwter on 6/10/2015.
 */


var app = angular.module('UniversityProject', ['ui.router', 'AppConfig','University']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/university/project/_home.html",
            controller: "HomeCtrl",
            resolve: {
                projects: function (UniversityService) {
                    return UniversityService.getProjects();
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope,projects) {
    console.log("HomeCtrl Start...");
    $scope.projects = projects.data;


});


