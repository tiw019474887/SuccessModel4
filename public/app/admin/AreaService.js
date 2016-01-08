/**
 * Created by chaow on 4/7/2015.
 */

angular.module('Area',[])
    .factory('AreaService',function($http){
        return {
            all : function(){
                return $http.get('/api/area');
            },
            get : function(id){
                return  $http.get('/api/area/'+id);
            },
            edit : function(id){
                return  $http.get('/api/area/'+id);
            },
            create : function(){
                return $http.get('/api/area/create');
            },
            store : function(area){

                return $http({
                    url : '/api/area',
                    method : 'post',
                    data : area
                })
            },
            delete : function(area){
                return $http.delete('/api/area/' + area.id);
            },
            save : function(area){
                return $http({
                    url : '/api/area/' + area.id,
                    method : 'put',
                    data : area
                })
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
            update: function ($id,$area) {
                return $http({
                    url: '/api/area/update-area'+$id,
                    method: 'post',
                    data: $area
                })
            }

        }
    })