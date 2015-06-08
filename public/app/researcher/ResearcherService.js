/**
 * Created by chaow on 4/7/2015.
 */

angular.module('Researcher',[])
    .factory('ResearcherService',function($http){
        return {
            getProjects : function (){
                return $http({
                    url : '/api/researcher/projects',
                    method : 'get'
            })
        },
            addProject : function($project){
                return $http({
                    url : '/api/researcher/add-project',
                    method: 'post',
                    data : $project
                })
            },
            submitProject : function($id,$project){
                return $http({
                    url : 'researcher/submit-project/'+ $id,
                    method : 'post',
                    data : $project
                })
            }
        }

    })