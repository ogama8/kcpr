var gdocs = 'https://spreadsheets.google.com/feeds/list/0Ao8Bu17C9mFydFUyWDJXaF9Dams2RFo2XzYxZ3lUTVE/od6/public/values?alt=json';

angular.module('kcpr-app', ['ngRoute', 'controllers'])

.config(function($routeProvider) {

   
   $routeProvider.when("/", {
      templateUrl: 'partials/news.html'
   });

   $routeProvider.when("/schedule", {
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
   });

   $routeProvider.when("/join", {
      templateUrl: 'partials/join.html'
   });
   $routeProvider.when("/people", {
      templateUrl: 'partials/people.html'
   });
   $routeProvider.when("/listen", {
      templateUrl: 'partials/listen.html'
   });
   $routeProvider.when("/about", {
      templateUrl: 'partials/about.html'
   });

   $routeProvider.otherwise({ redirectTo: "/" });

})
