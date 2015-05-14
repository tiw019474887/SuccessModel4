/**
 * Created by chaow on 4/7/2015.
 */

angular.module('User',[])
    .factory('UserService',function($http){
        return {
            all : function(){
                return $http.get('/api/user');
            },
            get : function(id){
                return  $http.get('/api/user/'+id);
            },
            edit : function(id){
                return  $http.get('/api/user/'+id);
            },
            create : function(){
                return $http.get('/api/user/create');
            },
            store : function(user){

                return $http({
                    url : '/api/user',
                    method : 'post',
                    data : user
                })
            },
            delete : function(user){
                return $http.delete('/api/user/' + user.id);
            },
            save : function(user){
                return $http({
                    url : '/api/user/' + user.id,
                    method : 'put',
                    data : user
                })
            },
            search : function($keyword){
                return $http({
                    url : '/api/user/search',
                    method : 'post',
                    data : { keyword : $keyword }
                })
            }
        }
    })