
var app = angular.module('UsersProject', ['ui.router', 'ui.tinymce', 'AppConfig'
    , 'angularify.semantic', 'flow', 'ngCookies', 'btford.markdown'
    , 'Faculty', 'User', 'Project', 'ProjectStatus', 'Youtube'
]);


app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('add', {
            url: "/add",
            templateUrl:"/app/admin/project/main1.blade.php",
            controller: "AddCtrl",
            resolve: {
                project: function (UsersService) {
                    return {data: {}}
                }
            }
        })

});

app.controller("ViewCtrl", function () {
});

app.controller("AddCtrl", function ($scope, $state, $timeout, $cookies, $filter,
                                    UserService, UserSearchService, ProjectService,
                                    statuses, faculties, project) {
    console.log("AddCtrl Start...");

    $scope.project = project.data;

    $scope.save = function () {
        ProjectService.addProjectComments($scope.project).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            $scope.message = response;
        });
    }

});


