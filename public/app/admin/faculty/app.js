/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('FacultyAdmin', ['ui.router','AppConfig','angularify.semantic', 'flow', 'Faculty']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/faculty/_home.html",
            controller: "HomeCtrl",
            resolve: {
                faculties: function (FacultyService) {
                    return FacultyService.all();
                }
            }
        })
        .state('add', {
            url: "/add",
            templateUrl: "/app/admin/faculty/_add.html",
            controller: "AddCtrl",
            resolve: {
                faculty: function (FacultyService) {
                    return {data: {}}
                }
            }
        })
        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/admin/faculty/_edit.html",
            controller: "EditCtrl",
            resolve: {
                faculty: function (FacultyService, $stateParams) {
                    return FacultyService.edit($stateParams.id)
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope, $state, faculties, FacultyService) {
    console.log("HomeCtrl Start...");

    $scope.faculties = faculties.data;
    $scope.faculty = {};
    $scope.delete_modal = false;

    $scope.showDeleteModal = function (faculty) {
        $scope.faculty = faculty;
        $scope.delete_modal = true;
    }

    $scope.closeDeleteModal = function () {
        $scope.delete_modal = false;
    }

    $scope.ajaxDelete = function (faculty, bool) {
        $scope.faculty = faculty;
        if (bool) {
            FacultyService.delete(faculty).success(function (response) {
                $scope.closeDeleteModal();
                FacultyService.all().success(function (response) {
                    $scope.faculties = response;
                })
            });
        } else {
            $scope.closeDeleteModal();
        }

    }
});

app.controller("AddCtrl", function ($scope, $state, faculty, FacultyService) {
    console.log("AddCtrl Start...");

    $scope.faculty = faculty.data;

    $scope.save = function () {
        FacultyService.store($scope.faculty).success(function (resposne) {
            $state.go('home');
            //$state.go("edit",{id:resposne.id});
        }).error(function (response) {
            alert(response.name_th);
        });
    }
});

app.controller("EditCtrl", function ($scope, $state, faculty, FacultyService) {
    console.log("EditCtrl Start...");

    $scope.faculty = faculty.data;

    $scope.myFlow = new Flow({
        target: '/api/faculty/'+$scope.faculty.id+'/logo',
        singleFile: true,
        method : 'post',
        testChunks : false,
        headers: function (file, chunk, isTest) {
            return {
                'X-CSRFToken': cookie.get("csrftoken")// call func for getting a cookie
            }
        }
    })


    $scope.uploadFile = function(){
        $scope.myFlow.upload();
    }

    $scope.cancelFile = function (file){
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index,1);

    }

    $scope.save = function () {
        FacultyService.save($scope.faculty).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            alert(response.name_th);
        });
    }
});