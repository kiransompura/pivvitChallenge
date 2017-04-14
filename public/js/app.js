var routerApp = angular.module('routerApp', ['ui.router', 'datatables']);

routerApp.config(function ($stateProvider, $urlRouterProvider) {

  $urlRouterProvider.otherwise('/home');

  $stateProvider
      .state('home', {
        url: '/home',
        templateUrl: 'js/views/partial-home.html'
      })
      .state('home.list', {
        url: '/list',
        templateUrl: 'js/views/list.html',
        controller: 'purchaseController',
      })
      .state('home.create', {
        url: '/create',
        templateUrl: 'js/views/create.html',
        controller: 'purchaseController',
      });
});