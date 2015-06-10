/**
 * Created by chaow on 4/7/2015.
 */

angular.module('University',[])
    .factory('UniversityService',function($http){
        return {
            getProjects : function (){
                return $http({
                    url : '/api/university/projects',
                    method : 'get'
            })
        },
            acceptProject : function($id,$project){
                return $http({
                    url : '/api/university/accept-project/'+$id,
                    method: 'post',
                    data : $project
                })
            },
            rejectProject : function($id,$project){
                return $http({
                    url : '/api/university/rejectProject/'+ $id,
                    method : 'post',
                    data : $project
                })
            }
        }

    })