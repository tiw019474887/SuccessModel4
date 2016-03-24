 /**
 * Created by chaow on 4/7/2015.
 */


var app = angular.module('EditUserAdmin', ['ui.router', 'ngCookies',
    'AppConfig', 'angularify.semantic', 'flow',
    'User', 'Role', 'Faculty'
]);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/user/_home.html",
            controller: "HomeCtrl",
            resolve: {
                users: function (UserService,$stateParams) {
                    return UserService.get($stateParams.id);
                }
            }
        })

        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/admin/user/_edit.html",
            controller: "EditCtrl",
            resolve: {
                user: function (UserService, $stateParams) {
                    return UserService.edit($stateParams.id)
                },
                roles: function (RoleService) {
                    return RoleService.all();
                },
                faculties: function (FacultyService) {
                    return FacultyService.all();
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope, $state, users, UserService,$timeout) {
    console.log("HomeCtrl Start...");

    $scope.pagination = users.data;
    $scope.users = users.data;
    $scope.user = {};

    $scope.delete_modal = false;
    $scope.showDeleteModal = function (user) {
        $scope.user = user;
        $scope.delete_modal = true;
    }

    $scope.closeDeleteModal = function () {
        $scope.delete_modal = false;
    }

    $scope.ajaxDelete = function (user, bool) {
        $scope.user = user;
        if (bool) {
            UserService.delete(user).success(function (response) {
                $scope.closeDeleteModal();
                UserService.all().success(function (response) {
                    $scope.users = response;
                })
            });
        } else {
            $scope.closeDeleteModal();
        }

    }
});

app.controller("EditCtrl", function ($scope, $state, user, UserService, roles, faculties, $cookies, $timeout) {
    console.log("EditCtrl Start...");

    $scope.user = user.data;
    $scope.roles = roles.data;
    $scope.faculties = faculties.data;

    $scope.upload = {};
    $scope.upload.myFlow = new Flow({
        target: '/api/user/' + $scope.user.id + '/logo',
        singleFile: true,
        method: 'post',
        testChunks: false,
        headers: function (file, chunk, isTest) {
            return {
                'X-XSRF-TOKEN': $cookies.get('XSRF-TOKEN')// call func for getting a cookie
            }
        }
    })


    $scope.upload.uploadFile = function () {
        $scope.upload.myFlow.upload();
    }

    $scope.upload.cancelFile = function (file) {
        var index = $scope.upload.myFlow.files.indexOf(file)
        $scope.upload.myFlow.files.splice(index, 1);

    }


    $scope.save = function () {
        UserService.save($scope.user).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            $scope.message = response;
        });
    }

    function onAddRole($label, value, text) {
        for (var i = 0; i < $scope.roles.length; i++) {
            if ($label == $scope.roles[i].id) {
                $scope.user.roles.push($scope.roles[i]);
            }
        }
    }

    function onRemoveRole(removedValue, removedText, $removedChoice) {
        for (var i = 0; i < $scope.user.roles.length; i++) {
            if (removedValue == $scope.user.roles[i].id) {
                $scope.user.roles.splice(i, 1);
            }
        }
    }

    $scope.hasRole = function (role) {

        for (var i = 0; i < $scope.user.roles.length; i++) {
            if (role.id == $scope.user.roles[i].id) {
                return true;
            }
        }
        return false;
    }


    $timeout(function () {
        $('#roles_dropdown').dropdown({
            onAdd: onAddRole,
            onRemove: onRemoveRole,
            direction: 'upward'
        });
        $('#faculty_dropdown').dropdown({
            direction: 'upward'
        });
    }, 100)
});