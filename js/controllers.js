angular.module('controllers', [])

.controller('HeaderCtrl', function($scope, $location) {

   $scope.$location = $location;

   $scope.a = document.getElementById('stream');
})

.controller('ScheduleCtrl', function($scope, schedule) {

   $scope.rows = schedule.feed.entry;

   _.each(schedule.feed.entry, function(row, index) {

      for(var day in row) {
         switch(day) {
            case 'gsx$sun':
            case 'gsx$mon':
            case 'gsx$tues':
            case 'gsx$wed':
            case 'gsx$thurs':
            case 'gsx$fri':
            case 'gsx$sat':
               row[day].rowspan = 1;

               if(row[day].$t.substring(0,3) == "[r]") {

                  row[day].type = 'reg';

               } else if(row[day].$t.substring(0,3) == "[s]") {

                  row[day].type = 'spec';

               } else if(row[day].$t.substring(0,3) == "[t]") {
                  row[day].type = 'talk';

               } else if(row[day].$t.substring(0,3) == "[o]") {
                  row[day].type = 'otto';

               }

               row[day].$t = row[day].$t.substring(4);

               for(var i = index+1; i < $scope.rows.length; i++) {

                  if($scope.rows[i][day].$t.length != 0) {
                     break;
                  }

                  row[day].rowspan++;
               }
               break;
         }
      }
   })

   $scope.shows = schedule;

})
