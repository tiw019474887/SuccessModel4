/**
 * Created by tiwter on 6/8/2015.
 */
/**
 * Created by chaow on 4/7/2015.
 */

var app = angular.module('ResearcherProject', ['ui.router', 'AppConfig', 'User', 'Researcher', 'Youtube'
]);

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
                project: function (ResearcherService, $stateParams) {
                    return ResearcherService.get($stateParams.id)
                },
                images: function (ResearcherService, $stateParams) {
                    return ResearcherService.getImages($stateParams.id);
                },
                members: function (ResearcherService, $stateParams) {
                    return ResearcherService.getMembers($stateParams.id);
                },
                file: function (ResearcherService, $stateParams) {
                    return ResearcherService.getFile($stateParams.id);
                },
                previousFiles: function (ResearcherService, $stateParams) {
                    return ResearcherService.getPreviousFiles($stateParams.id);
                },
                youtubes: function (ResearcherService, $stateParams) {
                    return ResearcherService.getYoutubes($stateParams.id);
                }

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

app.controller("EditCtrl", function ($scope, $state, $timeout, ResearcherService
    , project, images, members, file, previousFiles, youtubes ) {

    console.log("EditCtrl Start...");

    $scope.project = project.data;
    $scope.images = images.data;
    $scope.projectMembers = members.data;
    $scope.file = file.data;
    $scope.previousFiles = previousFiles.data;
    $scope.youtubes = youtubes.data;
    $scope.keyword;

    $scope.submit = function () {
        ResearcherService.submit($scope.project).success(function (resposne) {
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
app.controller("ProjectMemberCtrl", function ($scope, $stateParams, $state, $timeout,
                                              UserSearchService, UserService, ResearcherService) {

    var self = this;
    self.firstInit = false;
    $scope.initProjectMemberCtrl = function () {
        console.log("ProjectMemberCtrl Start...")
        if (self.firstInit) {
            ResearcherService.getMembers($stateParams.id).success(function (resposne) {
                self.projectMembers = resposne;
            });
        } else {
            self.projectMembers = $scope.projectMembers
        }

        self.firstInit = true;
    }

    $scope.initProjectMemberCtrl();

    self.member = UserSearchService.getSearchAjax();
    self.member.addMember = function (user) {

    }

    self.member.addMember = function (user) {
        ResearcherService.addMember($scope.project.id, user)
            .success(function (response) {
                //console.log(response);
                //alert('view console');
                self.projectMembers.push(response);
            })
    }

    self.member.removeMember = function (user) {
        console.log(user);
        ResearcherService.deleteMember($scope.project.id, user)
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
app.controller("ProjectPhotoController", function ($scope, $state, $cookies, $timeout,
                                                   UserService, ResercherService) {

    var self = this;
    self.firstInit = false;
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

        self.loadImages();
        self.firstInit = true;
    }

    self.loadImages = function () {
        if (self.firstInit) {
            ResercherService.getImages(self.project.id)
                .success(function (response) {
                    self.images = response;
                    //console.log(response);
                })
        } else {
            self.images = $scope.images;
        }

    };


    self.uploadFiles = function () {
        console.log("do uploading");
        self.myFlow.upload();
    }

    self.addFileToList = function ($file, $message, $flow) {
        //console.log($file);
        //console.log($message);

        var file = JSON.parse($message);
        self.images.push(file);
        $flow.removeFile($file);
    }

    self.deleteImage = function (image) {

        if (confirm("Do you want to delete this image")) {
            ResercherService.deleteImage(self.project.id, image)
                .success(function (response) {
                    var i = 0;
                    var index = -1;

                    for (i = 0; i < self.images.length; i++) {
                        if (self.images[i].id == image.id) {
                            index = i;
                            break;
                        }
                    }
                    if (index != -1) {
                        self.images.splice(index, 1);
                    }
                })
        }

    }

    $scope.initProjectPhotoController();

});

app.controller("ProjectFileController", function ($scope, $state, $cookies, $timeout,
                                                  ResercherService) {

    var self = this;
    self.firstInit = false;
    self.file = {};
    $scope.initProjectFileController = function () {
        console.log("ProjectFileController Start...");
        self.project = $scope.project;
        if (self.firstInit) {
            ResercherService.getFiles($stateParams.id)
                .success(function (response) {
                    self.files = response;
                })
        } else {
            self.file = $scope.file
            self.previousFiles = $scope.previousFiles;
        }


        self.myFlow = new Flow({
            target: '/api/project/' + self.project.id + '/file',
            singleFile: true,
            method: 'post',
            testChunks: false,
            headers: function (file, chunk, isTest) {
                return {
                    'X-XSRF-TOKEN': $cookies.get('XSRF-TOKEN')// call func for getting a cookie
                }
            }
        });

        self.uploadFiles = function () {
            console.log("do uploading");
            self.myFlow.upload();
        };

        self.addFileToList = function ($file, $message, $flow) {
            console.log('add file to list');
            var file = JSON.parse($message);
            if ($scope.file) {
                self.previousFiles.splice(0, 0, $scope.file);
            }
            self.file = file;
            $scope.file = file;
            $flow.removeFile($file);
        };

        self.firstInit = true;
    };

    $scope.initProjectFileController();
});

app.controller("ProjectYoutubeController", function ($scope, $state, $cookies, $timeout,
                                                     ResercherService, YoutubeService) {

    var self = this;
    self.firstInit = false;
    self.youtubes = [];
    self.youtube = {};
    $scope.initProjectYoutubeController = function () {
        console.log("ProjectYoutubeController Start...");
        self.project = $scope.project;
        if (self.firstInit) {
            ResercherService.getYoutubes($stateParams.id)
                .success(function (response) {
                    self.youtubes = response;
                    self.youtube = [];
                })
        } else {
            self.youtubes = $scope.youtubes;
            console.log($scope.youtubes);
        }

    };

    self.validYT = function (url) {
        var p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
        return (url.match(p)) ? RegExp.$1 : false;
    }

    self.addYoutube = function () {

        if (self.validYT(self.youtube.url)) {


            var vid = self.getParameterByName(self.youtube.url, 'v');

            YoutubeService.getVideoDetail(vid)
                .success(function (response) {
                    var result = response;
                    var vidsnipplet = result.items[0].snippet;
                    var title = vidsnipplet.title;
                    var description = vidsnipplet.description;

                    var thumbnail = vidsnipplet.thumbnails.default.url

                    self.youtube.title = title;
                    self.youtube.thumbnail_url = thumbnail;
                    self.youtube.description = description;
                    self.youtube.vid = vid;
                    console.log(self.youtube);

                    ResercherService.addYoutube(self.project.id, self.youtube)
                        .success(function (resposne) {
                            self.youtubes.push(resposne);
                            self.youtube = null;
                        })
                })
        } else {
            alert('Please enter valid youtube url.');
        }

    }

    self.deleteYoutube = function (youtube) {
        ResercherService.deleteYoutube(self.project.id, youtube)
            .success(function (response) {
                var i;
                for (i = 0; i < self.youtubes.length; i++) {
                    if (self.youtubes[i].id == youtube.id) {
                        self.youtubes.splice(i, 1);
                        break;
                    }
                }
            })
    }

    self.getParameterByName = function (url, name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(url);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    };


    $scope.initProjectYoutubeController();

});