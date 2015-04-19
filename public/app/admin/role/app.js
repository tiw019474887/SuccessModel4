/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('RoleAdmin', ['ui.router', 'angularify.semantic', 'flow', 'UserType']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/role/_home.html",
            controller: "HomeCtrl",
            resolve: {
                userTypes: function (UserTypeService) {
                    return UserTypeService.all();
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope, $state, userTypes) {
    console.log("HomeCtrl Start...");

    $scope.userTypes = userTypes.data;

});
