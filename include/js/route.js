app.config(function($routeProvider) {
    $routeProvider
    .when('/', {
        templateUrl : './views/login.php'
    })
    .when('/home', {
      templateUrl : './views/components/_home.php'
    })
    .when('/feed', {
      templateUrl : './views/components/_newsFeed.php'
    })
    
});