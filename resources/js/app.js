require('./bootstrap');
require('angular');
(function() {
    angular.module('services', []);
    angular.module('controllers', ['directives']);
    angular.module('directives', ['services']);
    var myApp = angular.module("myApp",['controllers']);
 })();
