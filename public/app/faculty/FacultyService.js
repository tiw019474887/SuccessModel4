/**
 * Created by chaow on 4/7/2015.
 */

angular.module('Faculty',[])
    .factory('FacultyService',function($http){
        return {
            getProjects : function (){
                return $http({
                    url : '/api/faculty/projects',
                    method : 'get'
            })
        },
            acceptProject : function($id,$project){
                return $http({
                    url : '/api/faculty/accept-project/'+$id,
                    method: 'post',
                    data : $project
                })
            },
            rejectProject : function($id,$project){
                return $http({
                    url : '/api/faculty/rejectProject/'+ $id,
                    method : 'post',
                    data : $project
                })
            },
            get :function($id,$project){
                return $http ({
                    url:'api/faculty/get-project/'+ $id,
                    method : 'get',
                    data: $project
                })
            }
        }

    })