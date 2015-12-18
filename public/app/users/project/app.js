

var app = angular.module('UsersProject', ['ui.router', 'AppConfig', 'Users','Researcher',
     'angularify.semantic', 'flow', 'ngCookies', 'btford.markdown']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/users/project/_home.html",
            controller: "HomeCtrl",
            resolve: {
                projects: function (ResearcherService) {
                    return ResearcherService.getProjects();
                }
            }
        })

        .state('view', {
            url: "/:id",
            templateUrl: "/app/users/project/_view.html",
            controller: "ViewCtrl",
            resolve: {
                project: function (ResearcherService, $stateParams) {
                    return ResearcherService.get($stateParams.id)
                },
                addProjectComments: function (UsersService) {
                    return {data: {}}
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope,$timeout,projects,$state,ResearcherService) {
    console.log("HomeCtrl Start...");
    $scope.projects = projects.data;

});

app.controller("ViewCtrl", function ($scope,$state,$timeout,project,UsersService) {
    console.log("AddCtrl Start...");
    $scope.project = project.data;

    $scope.addProject = function () {
        UsersService.addProjectComments($scope.project).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            alert(response.comment);
        });
    }


    $timeout(function () {
        $('.menu .item').tab();
    }, 100);


});
