var routerApp = angular.module('routerApp', ['ui.router', 'datatables']);

routerApp.config(function ($stateProvider, $urlRouterProvider) {

  $urlRouterProvider.otherwise('/home');

  $stateProvider
      .state('home', {
        url: '/home',
        templateUrl: 'partial-home.html'
      })
      .state('home.list', {
        url: '/list',
        templateUrl: 'list.html',
        controller: 'purchaseController',
      })
      .state('home.create', {
        url: '/create',
        templateUrl: 'create.html',
        controller: 'purchaseController',
      });
});