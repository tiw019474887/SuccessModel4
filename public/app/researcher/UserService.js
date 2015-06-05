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

    .factory('UserSearchService',function(UserService,$timeout){
        return {
            getSearchAjax : function(){
              var output = {
                  tempFilterText : '',
                  filterTextTimeout : {},
                  keyword : "",
                  searchUser : function($keyword){
                      if (output.filterTextTimeout) $timeout.cancel(output.filterTextTimeout);

                      output.tempFilterText = $keyword;
                      output.filterTextTimeout = $timeout(function() {
                          output.filterText = output.tempFilterText;
                          //console.log($scope.filterText);
                          if (output.filterText.length ==0){

                          }else {
                              UserService.search(output.filterText)
                                  .success(function(response){
                                      output.users = response;
                                  });
                          }
                      }, 250); // delay 250 ms
                  }
              }
                return output;
            }
        }
    })