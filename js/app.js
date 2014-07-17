var gdocs = 'https://spreadsheets.google.com/feeds/list/0Ao8Bu17C9mFydFUyWDJXaF9Dams2RFo2XzYxZ3lUTVE/od6/public/values?alt=json';

angular.module('kcpr-app', ['ngRoute', 'controllers', 'loadscript'])

//TO BE IMPLEMTED WHEN WE GET THE RIGHT SERVER CONFIGURATION
//.config(function($routeProvider, $locationProvider) {
.config(function($routeProvider) {

   $routeProvider
      .when("/news", {
         templateUrl: 'partials/news.html'
      })

      .when("/schedule", {
         templateUrl: 'partials/schedule.html',
         controller: 'ScheduleCtrl',
         resolve: {
            schedule: ['$http', function($http) {
               return $http.get(gdocs)
                  .then(function (data) {
                     return data.data;
                  });
            }]
         }
      })
      .when("/join", {
         templateUrl: 'partials/join.html'
      })
      .when("/contact", {
         templateUrl: 'partials/contact.html',
         controller: 'ContactCtrl'
      })
      .when("/listen", {
         templateUrl: 'partials/listen.html'
      })
      .when("/about", {
         templateUrl: 'partials/about.html'
      })
      .when("/pledge", {
         templateUrl: 'partials/pledge.html'
      })
      .otherwise({ redirectTo: "/news" });

   //TO BE IMPLEMTED WHEN WE GET THE RIGHT SERVER CONFIGURATION
   //$locationProvider.html5Mode(true);

});
