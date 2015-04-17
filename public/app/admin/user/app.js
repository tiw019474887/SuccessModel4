/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('UserAdmin', ['ui.router', 'angularify.semantic', 'flow', 'User','UserType']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/user/_home.html",
            controller: "HomeCtrl",
            resolve: {
                users: function (UserService) {
                    return UserService.all();
                }
            }
        })
        .state('add', {
            url: "/add",
            templateUrl: "/app/admin/user/_add.html",
            controller: "AddCtrl",
            resolve: {
                user: function (UserService) {
                    return {data: {}}
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
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope, $state, users, UserService) {
    console.log("HomeCtrl Start...");

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

app.controller("AddCtrl", function ($scope, $state, user, UserService) {
    console.log("AddCtrl Start...");

    $scope.user = user.data;

    $scope.message = null;

    $scope.save = function () {
        UserService.store($scope.user).success(function (resposne) {
            $state.go('home');
            //$state.go("edit",{id:resposne.id});
        }).error(function (response) {
            $scope.message = response;
        });
    }
});

app.controller("EditCtrl", function ($scope, $state, user, UserService) {
    console.log("EditCtrl Start...");

    $scope.user = user.data;

    $scope.myFlow = new Flow({
        target: '/api/user/'+$scope.user.id+'/logo',
        singleFile: true,
        method : 'post',
        testChunks : false
    })


    $scope.uploadFile = function(){
        $scope.myFlow.upload();
    }

    $scope.cancelFile = function (file){
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index,1);

    }

    $scope.save = function () {
        UserService.save($scope.user).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            alert(response.name_th);
        });
    }
});