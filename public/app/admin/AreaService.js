/**
 * Created by chaow on 4/7/2015.
 */

angular.module('Area',[])
    .factory('AreaService',function($http){
        return {
            index: function () {
                return $http({
                    url: '/api/area',
                    method: 'get'
                })
            },
            getID: function () {
                return $http({
                    url: '/api/area/get/'+$id,
                    method: 'get'
                })
            },
            addArea: function () {
                return $http({
                    url: '/api/area/add',
                    method: 'post'
                })
            },
            update: function () {
                return $http({
                    url: '/api/area/update',
                    method: 'get'
                })
            }
        }
    })