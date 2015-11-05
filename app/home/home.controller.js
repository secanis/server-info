angular.module('server-manager')
    .controller('homeCtrl', function($scope, $rootScope, $location, $state, $http, $interval){
        $scope.getSensorsData = function() {
            $http({
                method: 'GET',
                url: $rootScope.apiPath + '/server/sensors'
            }).then(function successCallback(response) {
                $scope.sensors = response.data;
            }, function errorCallback(response) {
                console.error(response);
            });
        }
        
        $scope.getServerMetadata = function() {
            $http({
                method: 'GET',
                url: $rootScope.apiPath + '/server/metadata'
            }).then(function successCallback(response) {
                $scope.metadata = response.data;
            }, function errorCallback(response) {
                console.error(response);
            });
        }
        
        $scope.getServerFilesystem = function() {
            $http({
                method: 'GET',
                url: $rootScope.apiPath + '/server/filesystem'
            }).then(function successCallback(response) {
                $scope.filesystem = response.data;
            }, function errorCallback(response) {
                console.error(response);
            });
        }
        
        $scope.getServerPartition = function() {
            $http({
                method: 'GET',
                url: $rootScope.apiPath + '/server/partition'
            }).then(function successCallback(response) {
                $scope.partition = response.data;
            }, function errorCallback(response) {
                console.error(response);
            });
        }
        
        $scope.getServerHardware = function() {
            $scope.loading = $http({
                method: 'GET',
                url: $rootScope.apiPath + '/server/hardware'
            }).then(function successCallback(response) {
                $scope.hardware = response.data;
            }, function errorCallback(response) {
                console.error(response);
            });
        }
        
        // initial calls
        $scope.initialLoad = function() {
            $scope.getServerHardware();
            $scope.getSensorsData();
            $scope.getServerMetadata();
            $scope.getServerFilesystem();
            $scope.getServerPartition();
        }
    
        $scope.initialLoad();
    
//        $interval(function() {
//            $scope.initialLoad();
//        }, 30000);
    });