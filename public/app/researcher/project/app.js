/**
 * Created by tiwter on 6/8/2015.
 */
/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('ResearcherProjectAdmin', ['ui.router', 'AppConfig','Researcher']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/researcher/project/_home.html",
            controller: "HomeCtrl",
            resolve: {
                faculties: function (ResearcherService) {
                    return ResearcherService.all();
                }
            }
        })
        .state('add', {
            url: "/add",
            templateUrl: "/app/researcher/project/_add.html",
            controller: "AddCtrl",
            resolve: {
                faculties: function (ResearcherService) {
                    return ResearcherService.all();
                }
            }
        })
        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/researcher/project/_edit.html",
            controller: "EditCtrl",
            resolve: {
                faculties: function (ResearcherService) {
                    return ResearcherService.all();
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope) {
    console.log("HomeCtrl Start...");

});

app.controller("AddCtrl", function ($scope) {

});

app.controller("EditCtrl", function ($scope) {

});

