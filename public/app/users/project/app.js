

var app = angular.module('UsersProject', ['ui.router', 'AppConfig','Users','Project',
    'angularify.semantic', 'flow', 'ngCookies', 'btford.markdown']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/resources/views/users/project/main1.blade.php",
            controller: "HomeCtrl",
            resolve: {
                projects: function (UsersService) {
                    return UsersService.all();
                }
            }
        })
    });

app.controller("HomeCtrl", function ($scope, projects) {
    console.log("HomeCtrl Start...");
    $scope.projects = projects.data;



});

