
angular.module('YearProject',[])
    .factory('YearProjectService',function($http){
        return {
            all : function(){
                return $http.get('/api/yearProject');
            }
        }
    })