//    server-info
//    2015 by secanis.ch

angular.module('server-manager', [
    'ui.router',
    'cgBusy',
    'angular-svg-round-progress'
])
    .config(function($stateProvider) {
        $stateProvider
            .state('start', {
                url: '',
                templateUrl: 'app/home/home.html',
                controller: 'homeCtrl'
            })
            .state('root', {
                url: '/',
                templateUrl: 'app/home/home.html',
                controller: 'homeCtrl'
            })
            .state('home', {
                url: '/home',
                templateUrl: 'app/home/home.html',
                controller: 'homeCtrl'
            });
    })
    .run(function($rootScope) {
        $rootScope.apiPath = "/api/index.php/";
    });