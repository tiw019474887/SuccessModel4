/**
 * Created by chaow on 4/7/2015.
 */

angular.module('UserType',[])
    .factory('UserTypeService',function($http){
        return {
            all : function() {
                return $http.get('/api/user-type');
            }
        }
    })