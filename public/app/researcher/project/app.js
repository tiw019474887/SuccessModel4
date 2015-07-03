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

app.controller("EditCtrl", function ($scope,$timeout,ResearcherService,
                                     statuses, faculties, project, images, members, file, previousFiles, youtubes) {

    console.log("EditCtrl Start...");

    $scope.project = project.data;
    $scope.images = images.data;
    $scope.statuses = statuses.data;
    $scope.faculties = faculties.data;
    $scope.projectMembers = members.data;
    $scope.file = file.data;
    $scope.previousFiles = previousFiles.data;
    $scope.youtubes = youtubes.data;
    $scope.keyword;


    $scope.mceOptions = {
        inline: false,
        content_css: '/packages/semantic-ui/dist/semantic.min.css',
        plugins: "tinyflow image hr",
        skin: 'lightgray',
        theme: 'modern',
        relative_urls: false,
        height: 400,
        menubar: true,
        toolbar1: "undo redo | formatselect fontselect fontsizeselect removeformat  | bold italic | alignleft  aligncenter alignright alignjustify | " +
        "bullist numlist outdent indent | hr | link unlink | image tinyflow |"
    };


    $scope.myFlow = new Flow({
        target: '/api/project/' + $scope.project.id + '/logo',
        singleFile: true,
        method: 'post',
        testChunks: false,
        headers: function (file, chunk, isTest) {
            return {
                'X-XSRF-TOKEN': $cookies.get('XSRF-TOKEN')
            }
        }
    })


    $scope.uploadFile = function () {
        $scope.myFlow.upload();
    }

    $scope.cancelFile = function (file) {
        var index = $scope.myFlow.files.indexOf(file)
        $scope.myFlow.files.splice(index, 1);

    }

    $scope.addProject = function () {
        ResearcherService.addProject($scope.project).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            alert(response.name_th);
        });
    }


    $timeout(function () {
        $('.menu .item').tab();
        $('.ui.dropdown').dropdown();
        $('.search').bind('keypress', function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
            }
        })
    }, 100);

});

