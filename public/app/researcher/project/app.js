/**
 * Created by tiwter on 6/8/2015.
 */
/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('ResearcherProject', ['ui.router', 'AppConfig','Researcher']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/researcher/project/_home.html",
            controller: "HomeCtrl",
            resolve: {
                projects: function (ResearcherService) {
                    return ResearcherService.getProjects();
                }
            }
        })
        .state('add', {
            url: "/add",
            templateUrl: "/app/researcher/project/_add.html",
            controller: "AddCtrl",
            resolve: {
                project: function (ResearcherService) {
                    return {data: {}}
                }

            }
        })
        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/researcher/project/_edit.html",
            controller: "EditCtrl",
            resolve: {

            }
        })
});

app.controller("HomeCtrl", function ($scope,projects) {
    console.log("HomeCtrl Start...");
    $scope.projects = projects.data;




});

app.controller("AddCtrl", function ($scope,$state,$timeout,project,ResearcherService) {
    console.log("AddCtrl Start...");
    $scope.project = project.data;

    $scope.addProject = function () {
        ResearcherService.addProject($scope.project).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            alert(response.name_th);
        });
    }
    $timeout(function () {
        $('.menu .item').tab();
    }, 100);

});

app.controller("EditCtrl", function ($scope) {

});

