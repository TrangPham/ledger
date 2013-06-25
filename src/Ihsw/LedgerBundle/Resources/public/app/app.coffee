module = window.module = angular.module 'ledger', ['ui.bootstrap']
module.config ['$routeProvider', ($routeProvider) ->
    $routeProvider.
        when('/home', {
            controller: 'HomeController'
            templateUrl: 'app/partials/home.html'
        }).
        when('/items', {
            controller: 'ItemController'
            templateUrl: 'app/partials/item/list.html'
        }).
        when('/item/new', {
            controller: 'ItemNewController'
            templateUrl: 'app/partials/item/new.html'
        }).
        when('/entries', {
            controller: 'EntryController'
            templateUrl: 'app/partials/entry/list.html'
        }).
        when('/entry/new', {
            controller: 'EntryNewController'
            templateUrl: 'app/partials/entry/new.html'
        }).
        when('/entry/:entryId', {
            controller: 'EntryViewController'
            templateUrl: 'app/partials/entry/view.html'
        }).
        when('/entry/:entryId/add-item', {
            controller: 'EntryViewController'
            templateUrl: 'app/partials/entry/view.html'
        }).
        when('/bullshit', {
            controller: 'BullshitController',
            templateUrl: 'app/partials/bullshit.html'
        }).
        otherwise({ redirectTo: '/home' })
]