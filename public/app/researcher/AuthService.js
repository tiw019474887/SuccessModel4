/**
 * Created by chaow on 4/7/2015.
 */

angular.module('Auth',[])
    .factory('AuthService',function($http){
        return {
            login : function(user){

                return $http({
                    url : '/api/auth/login',
                    method : 'post',
                    data : user
                })
            },
            logout : function(){
                return $http.post('/api/auth/logout/',[]);
            }
        }
    })