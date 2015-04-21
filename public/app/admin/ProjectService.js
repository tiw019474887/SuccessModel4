/**
 * Created by chaow on 4/7/2015.
 */

angular.module('Project',[])
    .factory('ProjectService',function($http){
        return {
            all : function(){
                return $http.get('/api/project');
            },
            get : function(id){
                return  $http.get('/api/project/'+id);
            },
            edit : function(id){
                return  $http.get('/api/project/'+id);
            },
            create : function(){
                return $http.get('/api/project/create');
            },
            store : function(project){

                return $http({
                    url : '/api/project',
                    method : 'post',
                    data : project
                })
            },
            delete : function(project){
                return $http.delete('/api/project/' + project.id);
            },
            save : function(project){
                return $http({
                    url : '/api/project/' + project.id,
                    method : 'put',
                    data : project
                })
            }
        }
    })