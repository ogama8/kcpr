angular.module('controllers', [])

.controller('HeaderCtrl', function($scope, $location) {

   $scope.$location = $location;

   $scope.a = document.getElementById('stream');

   var volume = $scope.a.volume;
   $scope.a.volume = 0;

   $scope.play = function() {
      $scope.a.volume = 1;
   };

   $scope.pause = function() {
      $scope.a.volume = 0;
   }
})

.controller('ContactCtrl', function($scope) {

   $scope.people = [
      {
         'title': 'General Manager',
         'name': 'Tyler Deitz',
         'description' : 'Our General Managers oversee all other KCPR executives, DJs, and functions. They are often our liasons with entities outside of KCPR. If you have a question about KCPR that doesn\'t fit with any of the other executes, shoot them an email.',
         'email': 'generalmanagers.kcpr@gmail.com'
      },
      {
         'title' : 'Business Directors',
         'name' : 'Roxanne Hoffman and Joe Durantini',
         'description' : 'Our Business Directors keep track of KCPR\'s general accounting and KCPR fund raising.',
         'email' : 'business.kcpr@gmail.com'
      },
      {
         'title' : 'Promotion Directors',
         'name' : 'Haley Brown and Bethany Benson',
         'description' : 'Our Promotion Directors interact with the community to mutually promote community events within KCPR and KCPR at community events. If you have an announcement you would like to air on KCPR, contact the Promotion Directors.',
         'email' : 'promotions.kcpr@gmail.com'
      },
      {
         'title' : 'Music Directors',
         'name' : 'Nick Cocores and Bobak Beheshti',
         'description' : 'Our Music Directors sort through new music each week to add into our rotation. They also host the New Releases show where brand new music is highlighted each week. If you are an artist or promoter looking to get your music on KCPR, contact the Music Directors. Please send physical copies to the address below.',
         'email' : 'music.kcpr@gmail.com'
      },
      {
         'title' : 'Program Directors',
         'name' : 'Kelly Stewart',
         'description' : 'Our Program Directors schedule KCPR\'s quarterly schedule. They are also in charge of our broadcast quality control. If you have a concern about content on KCPR, please email the Program Director.',
         'email' : 'programming.kcpr@gmail.com'
      },
      {
         'title' : 'Traffic Directors',
         'name' : 'Connor Griffith',
         'description' : 'Our Traffic Directors schedule public service announcement and underwriting. If you have a community announcement you think KCPR would like to broadcast, contact him with information about the event at least two weeks prior.',
         'email' : 'traffic.kcpr@gmail.com'
      },
      {
         'title' : 'Air Staff Instructors',
         'name' : 'Lauren Vukicevich',
         'description' : 'Our Air Staff Instructors train new DJs. If you have a question about the training process, please contact them.',
         'email' : 'kcpr91.3asi@gmail.com'
      },
      {
         'title' : 'Events Directors',
         'name' : 'Parker Glenn',
         'description' : 'Our Events Directors host KCPR-sponsored events. If you are a band or promoter who would like to schedule an appearence on KCPR or in the community, the Events Directors have the information you need.',
         'email' : 'events.kcpr@gmail.com'
      },
      {
         'title' : 'Internet Director',
         'name' : 'Eli Backer',
         'description' : 'Our Webmaster maintains our online presence. If you have something you would like to see on our website or a question about this website, contact them.',
         'email' : 'kcpr.internet@gmail.com'
      },
      {
         'title' : 'Faculty Advisor',
         'name' : 'Richard Gearhart',
         'description' : 'Richard Gearhart is the faculty advisor for KCPR. He maintains KCPR\'s relationship with the university.',
         'email' : ''
      }

   ]

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
