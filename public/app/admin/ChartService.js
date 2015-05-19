/**
 * Created by chaow on 4/7/2015.
 */

angular.module('SuccessChart',[])
    .factory('ChartService',function($http){
        return {
            facultyProjectChart : function(){
                return $http({
                    url : '/api/chart/faculty-project',
                    method : 'get'
                })
            }
        }
    })