/**
 * Created by chaow on 4/7/2015.
 */

angular.module('Area',[])
    .factory('AreaService',function($http){
        return {
            all : function(){
                return $http.get('/api/area');
            },
            index: function () {
                return $http({
                    url: '/api/area',
                    method: 'get'
                })
            },
            getID : function($id,$project){
                return $http({
                    url : '/api/area/get/'+ $id,
                    method : 'get',
                    data : $project
                })
            },
            addArea: function ($project) {
                return $http({
                    url: '/api/area/add',
                    method: 'post',
                    data : $project
                })
            },
            edit : function(id){
                return  $http.get('/api/area/'+id);
            },
            delete : function(area){
                return $http.delete('/api/area/' + area.id);
            },

            update: function ($id,$project) {
                return $http({
                    url: '/api/area/update'+$id,
                    method: 'post',
                    data: $project
                })
            }
        }
    })