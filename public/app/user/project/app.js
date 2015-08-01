/**
 * Created by tiwter on 8/1/2015.
 */
var app = angular.module('UniversityProject', ['ui.router', 'AppConfig', 'User', 'University',
    'Youtube','User','Project' , 'angularify.semantic', 'flow', 'ngCookies', 'btford.markdown']);

app.config(function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "/app/university/project/_home.html",
            controller: "HomeCtrl",
            resolve: {
                projects: function (UniversityService) {
                    return UniversityService.getProjects();
                }
            }
        })

        .state('view', {
            url: "/view/:id",
            templateUrl: "/app/university/project/_view.html",
            controller: "ViewCtrl",
            resolve: {
                project: function (UniversityService,$stateParams) {
                    return UniversityService.get($stateParams.id)
                },
                images: function (ProjectService, $stateParams) {
                    return ProjectService.getImages($stateParams.id);
                },
                members: function (ProjectService, $stateParams) {
                    return ProjectService.getMembers($stateParams.id);
                },
                file: function (ProjectService, $stateParams) {
                    return ProjectService.getFile($stateParams.id);
                },
                previousFiles: function (ProjectService, $stateParams) {
                    return ProjectService.getPreviousFiles($stateParams.id);
                },
                youtubes: function (ProjectService, $stateParams) {
                    return ProjectService.getYoutubes($stateParams.id);
                }
            }
        })
});

app.controller("HomeCtrl", function ($scope,projects) {
    console.log("HomeCtrl Start...");
    $scope.projects = projects.data;


});

app.controller("ViewCtrl", function ($scope, $state, $timeout, $sce,
                                     UserService, UserSearchService, ProjectService,UniversityService,
                                     project, images, members, file, previousFiles, youtubes) {
    console.log("ViewCtrl Start...");

    $scope.project = project.data;
    $scope.images = images.data;
    $scope.youtubes = youtubes.data;
    $scope.project.content = $sce.trustAsHtml($scope.project.content);
    $scope.showItem = null;
    $scope.members = members.data;
    $scope.setShowItem = function (item, type) {
        $scope.showItem = {item: item, type: type}
    }

    $scope.getYoutubeEmbedUrl = function (vid) {
        return $sce.trustAsResourceUrl('http://www.youtube.com/embed/' + vid + '?autoplay=0&enablejsapi=1&version=3&playerapiid=ytplayer');
    }

    if ($scope.youtubes.length > 0) {
        $scope.setShowItem($scope.youtubes[0], 'youtube');
    } else if ($scope.images.length > 0) {
        $scope.setShowItem($scope.images[0], 'image');
    } else {
        $scope.showItem = null;
    }
    $timeout(function(){
        $('.flexslider').flexslider({
            slideshow: true,
            video : true,
            before: function(slider){
                /* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
                playVideoAndPauseOthers($('.play3 iframe')[0]);
            }
        });

        function playVideoAndPauseOthers(frame) {
            $('iframe').each(function(i) {
                var func = this === frame ? 'playVideo' : 'stopVideo';
                this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
            });
        }

        /* ------------------ PREV & NEXT BUTTON FOR FLEXSLIDER (YOUTUBE) ------------------ */
        $('.flex-next, .flex-prev').click(function() {
            playVideoAndPauseOthers($('.play3 iframe')[0]);
        });
    },10)

    $scope.showRejectModal = function (project) {
        $scope.project = project;
        $scope.reject_modal = true;
    }

    $scope.closeRejectModal = function () {
        $scope.reject_modal = false;
    }


    $scope.ajaxReject = function (project, bool) {
        $scope.project = project;
        if (bool) {
            UniversityService.rejectProject($scope.project.id,$scope.project).success(function (response) {
                $scope.closeRejectModal();
                UniversityService.all().success(function (response) {
                    $scope.projects = response;
                })
                $state.go('home');
            });
        } else {
            $scope.closeRejectModal();
        }

    }



    $scope.showAcceptModal = function (project) {
        $scope.project = project;
        $scope.accept_modal = true;
    }

    $scope.closeAcceptModal = function () {
        $scope.accept_modal = false;
    }

    $scope.ajaxAccept = function (project, bool) {
        $scope.project = project;
        if (bool) {
            UniversityService.submit($scope.project.id,$scope.project).success(function (response) {
                $scope.closeAcceptModal();
                UniversityService.all().success(function (response) {
                    $scope.projects = response;
                })
                $state.go('home');
            });
        } else {
            $scope.closeAcceptModal();
        }

    }

});


