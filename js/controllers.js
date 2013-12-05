angular.module('controllers', [])

.controller('HeaderCtrl', function($scope) {
})

.controller('NewsCtrl', function($scope, tf) {

   tf.fetch('345690956013633536', 'timeline', 3, true, true, true, '', false, handleTweets, false);

   function handleTweets(tweets){
       var x = tweets.length;
       var n = 0;
       var element = document.getElementById('timeline');
       var html = '<ul>';
       while(n < x) {
         html += '<li>' + tweets[n] + '</li>';
         n++;
       }
       html += '</ul>';
       element.innerHTML = html;
   }

})

.controller('ScheduleCtrl', function($scope, schedule) {

   console.log(schedule);

   $scope.rows = schedule.feed.entry;

   console.log($scope.rows.length);

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
