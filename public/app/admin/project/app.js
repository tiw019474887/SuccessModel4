/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('ProjectAdmin', ['ui.router', 'AppConfig',
    'angularify.semantic', 'flow', 'Faculty', 'User', 'Project',
    'ProjectStatus', 'ngCkeditor', 'ngCookies'
]);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/admin/project/_home.html",
            controller: "HomeCtrl",
            resolve: {
                faculties: function (ProjectService) {
                    return ProjectService.all();
                }
            }
        })
        .state('add', {
            url: "/add",
            templateUrl: "/app/admin/project/_add.html",
            controller: "AddCtrl",
            resolve: {
                project: function (ProjectService) {
                    return {data: {}}
                },
                statuses: function (ProjectStatusService) {
                    return ProjectStatusService.all();
                },
                faculties: function (FacultyService) {
                    return FacultyService.all();
                }
            }
        })
        .state('edit', {
            url: "/edit/:id",
            templateUrl: "/app/admin/project/_edit.html",
            controller: "EditCtrl",
            resolve: {
                project: function (ProjectService, $stateParams) {
                    return ProjectService.edit($stateParams.id)
                },
                statuses: function (ProjectStatusService) {
                    return ProjectStatusService.all();
                },
                faculties: function (FacultyService) {
                    return FacultyService.all();
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope, $state, faculties, ProjectService) {
    console.log("HomeCtrl Start...");

    $scope.faculties = faculties.data;
    $scope.project = {};
    $scope.delete_modal = false;

    $scope.showDeleteModal = function (project) {
        $scope.project = project;
        $scope.delete_modal = true;
    }

    $scope.closeDeleteModal = function () {
        $scope.delete_modal = false;
    }

    $scope.ajaxDelete = function (project, bool) {
        $scope.project = project;
        if (bool) {
            ProjectService.delete(project).success(function (response) {
                $scope.closeDeleteModal();
                ProjectService.all().success(function (response) {
                    $scope.faculties = response;
                })
            });
        } else {
            $scope.closeDeleteModal();
        }

    }
});

app.controller("AddCtrl", function ($scope, $state, project, statuses, faculties, UserService, UserSearchService, ProjectService, $timeout) {
    console.log("AddCtrl Start...");

    $scope.project = project.data;
    $scope.faculties = faculties.data;

    $scope.save = function () {
        ProjectService.store($scope.project).success(function (resposne) {
            $state.go('home');
            //$state.go("edit",{id:resposne.id});
        }).error(function (response) {
            alert(response.name_th);
        });
    }

    $scope.statuses = statuses.data;

    $scope.updateStatus = function (status) {
        $scope.project.status = status;
    }

    $scope.updateFaculty = function (faculty) {
        $scope.project.faculty = faculty;
    }

    // search segment

    $scope.createdBy = {};

    $scope.createdBy.tempFilterText = '';
    $scope.createdBy.filterTextTimeout;

    $scope.createdBy.searchUser = function ($keyword) {
        if ($scope.createdBy.filterTextTimeout) $timeout.cancel($scope.createdBy.filterTextTimeout);

        $scope.createdBy.tempFilterText = $keyword;
        $scope.createdBy.filterTextTimeout = $timeout(function () {
            $scope.createdBy.filterText = $scope.createdBy.tempFilterText;
            //console.log($scope.filterText);
            if ($scope.createdBy.filterText.length == 0) {

            } else {
                UserService.search($scope.createdBy.filterText)
                    .success(function (response) {
                        $scope.createdBy.users = response;
                    });
            }

        }, 250); // delay 250 ms
    }
    //end search segment

    $scope.createdBy.checkUser = function (user) {

        if (!$scope.project.created_by) {
            $scope.project.created_by = null;
        }
        if ($scope.project.created_by) {
            if ($scope.project.created_by && user) {
                if ($scope.project.created_by.id == user.id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    $scope.createdBy.addUser = function (user) {
        $scope.project.created_by = user;
        $scope.createdBy.users = null;

    }

    $scope.createdBy.removeUser = function (user) {
        $scope.project.created_by = null;
    }

    $('.ui.dropdown').dropdown();
});

app.controller("EditCtrl", function ($scope, $state, project, UserService, UserSearchService, ProjectService, statuses, faculties, $timeout) {
    console.log("EditCtrl Start...");

    $scope.project = project.data;
    $scope.statuses = statuses.data;
    $scope.faculties = faculties.data;
    $scope.keyword;

    $scope.myFlow = new Flow({
        target: '/api/project/' + $scope.project.id + '/logo',
        singleFile: true,
        method: 'post',
        testChunks: false,
        headers: function (file, chunk, isTest) {
            return {
                'X-CSRFToken': cookie.get("csrftoken")// call func for getting a cookie
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

    $scope.save = function () {
        ProjectService.save($scope.project).success(function (resposne) {
            $state.go("home")
        }).error(function (response) {
            alert(response.name_th);
        });
    }

    $scope.updateStatus = function (status) {
        $scope.project.status = status;
    }

    $scope.updateFaculty = function (faculty) {
        $scope.project.faculty = faculty;
    }

    // search segment

    $scope.createdBy = {};

    $scope.createdBy.tempFilterText = '';
    $scope.createdBy.filterTextTimeout;

    $scope.createdBy.searchUser = function ($keyword) {
        if ($scope.createdBy.filterTextTimeout) $timeout.cancel($scope.createdBy.filterTextTimeout);

        $scope.createdBy.tempFilterText = $keyword;
        $scope.createdBy.filterTextTimeout = $timeout(function () {
            $scope.createdBy.filterText = $scope.createdBy.tempFilterText;
            //console.log($scope.filterText);
            if ($scope.createdBy.filterText.length == 0) {

            } else {
                UserService.search($scope.createdBy.filterText)
                    .success(function (response) {
                        $scope.createdBy.users = response;
                    });
            }

        }, 250); // delay 250 ms
    }
    //end search segment

    $scope.createdBy.checkUser = function (user) {

        if (!$scope.project.created_by) {
            $scope.project.created_by = null;
        }
        if ($scope.project.created_by) {
            if ($scope.project.created_by && user) {
                if ($scope.project.created_by.id == user.id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    $scope.createdBy.addUser = function (user) {
        $scope.project.created_by = user;
        $scope.createdBy.users = null;

    }

    $scope.createdBy.removeUser = function (user) {
        $scope.project.created_by = null;
    }

    $('.menu .item').tab();

    $timeout(function () {
        $('.ui.dropdown').dropdown();
    }, 100);

    $scope.project_id = 20;
});

app.controller("ProjectMemberCtrl", function ($scope, $stateParams, UserSearchService, $state, UserService, ProjectService, $timeout) {

    var self = this;

    $scope.initProjectMemberCtrl = function () {
        console.log("ProjectMemberCtrl Start...")
        ProjectService.getMembers($stateParams.id).success(function (resposne) {
            self.projectMembers = resposne;
        });
    }

    $scope.initProjectMemberCtrl();

    self.member = UserSearchService.getSearchAjax();
    self.member.addMember = function (user) {

    }

    self.member.addMember = function (user) {
        ProjectService.addMember($scope.project.id, user)
            .success(function (response) {
                //console.log(response);
                //alert('view console');
                self.projectMembers.push(response);
            })
    }

    self.member.removeMember = function (user) {
        console.log(user);
        ProjectService.deleteMember($scope.project.id, user)
            .success(function (response) {
                //console.log(response);
                //alert('view console');
                var index = self.findUser(user);
                if (index != -1) {
                    self.projectMembers.splice(index, 1);
                }
            })
    }

    self.findUser = function (user) {
        var countUsers = self.projectMembers.length;
        var i = 0;
        for (i = 0; i < countUsers; i++) {
            if (self.projectMembers[i].id === user.id) {
                return i;
            }
        }
        return -1;
    }

    self.checkUser = function ($user) {
        var countUsers = self.projectMembers.length;
        var i = 0;
        for (i = 0; i < countUsers; i++) {
            if (self.projectMembers[i].id === $user.id) {
                return true;
            }
        }
        return false;
    }

});

app.controller("ProjectPhotoController", function ($scope, $state, UserService, ProjectService, $cookies, $timeout) {

    var self = this;
    $scope.initProjectPhotoController = function () {
        console.log("ProjectPhotoController Start...");
        self.project = $scope.project;
        self.images = [];

        self.myFlow = new Flow({
            target: '/api/project/' + self.project.id + '/image',
            singleFile: false,
            method: 'post',
            testChunks: false,
            headers: function (file, chunk, isTest) {
                return {
                    'X-XSRF-TOKEN': $cookies.get('XSRF-TOKEN')// call func for getting a cookie
                }
            }
        })
    }

    self.loadImages = function () {
        ProjectService.getImages(self.project.id)
            .success(function (response) {
                self.images = response;
                //console.log(response);
            })
    };

    self.uploadFiles = function () {
        console.log("do uploading");
        self.myFlow.upload();
    }

    self.addFileToList = function($file,$message,$flow){
        //console.log($file);
        //console.log($message);

        var file = JSON.parse($message);
        self.images.push(file);
        $flow.removeFile($file);
    }

    self.deleteImage = function(image){
        ProjectService.deleteImage(self.project.id,image)
            .success(function(response){
                var i=0;
                var index = -1;

                for(i=0;i<self.images.length;i++){
                    if(self.images[i].id == image.id){
                        index = i;
                        break;
                    }
                }
                if(index != -1 ){
                    self.images.splice(index,1);
                }
            })
    }

    $scope.initProjectPhotoController();
    self.loadImages();
});