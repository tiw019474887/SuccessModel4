/**
 * Created by chaow on 4/7/2015.
 */

angular.module('Faculty',[])
    .factory('FacultyService',function($http){
        return {
            all : function(){
                return $http.get('/api/faculty');
            },
            get : function(id){
                return  $http.get('/api/faculty/'+id);
            },
            edit : function(id){
                return  $http.get('/api/faculty/'+id);
            },
            create : function(){
                return $http.get('/api/faculty/create');
            },
            store : function(faculty){

                return $http({
                    url : '/api/faculty',
                    method : 'post',
                    data : faculty
                })
            },
            delete : function(faculty){
                return $http.delete('/api/faculty/' + faculty.id);
            },
            save : function(faculty){
                return $http({
                    url : '/api/faculty/' + faculty.id,
                    method : 'put',
                    data : faculty
                })
            }
        }
    })