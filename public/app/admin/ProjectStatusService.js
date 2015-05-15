/**
 * Created by chaow on 4/7/2015.
 */

angular.module('ProjectStatus',[])
    .factory('ProjectStatusService',function($http){
        return {
            all : function(){
                return $http.get('/api/project-status');
            },
            get : function(id){
                return  $http.get('/api/project-status/'+id);
            },
            edit : function(id){
                return  $http.get('/api/project-status/'+id);
            },
            create : function(){
                return $http.get('/api/project-status/create');
            },
            store : function(project){

                return $http({
                    url : '/api/project-status',
                    method : 'post',
                    data : project
                })
            },
            delete : function(project){
                return $http.delete('/api/project-status/' + project.id);
            },
            save : function(project){
                return $http({
                    url : '/api/project-status/' + project.id,
                    method : 'put',
                    data : project
                })
            }
        }
    })