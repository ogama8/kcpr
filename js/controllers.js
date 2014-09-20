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
         'name': 'Parker Glenn',
         'description' : 'Our General Manager oversees all KCPR executives, DJs, and functions. They are also our go-between within the Journalism Department. If you have a question about KCPR that doesn\'t fit with any of the other executives, shoot them an email.',
         'email': 'kcpr.generalmanager@gmail.com'
      },
      {
         'title' : 'Outreach Director',
         'name' : 'Leona Rajaee',
         'description' : 'Our Outreach Director serves as our liaison with entities outside of KCPR.  They also manage communications between the station and all current and former KCPR DJs. If you would like to reach the KCPR community or have any KCPR-related questions, let them know.',
         'email' : 'kcpr.outreach@gmail.com'
      },
      {
         'title' : 'Promotion & Underwriting Director and Assistant Promotion & Underwriting Director',
         'name' : 'Haley Brown and Erica Hudson',
         'description' : 'Our Promotion & Underwriting team handle partnerships with the station and coordinate on-air performances. If you have an announcement you would like to air on KCPR, contact the Promotion & Underwriting team.',
         'email' : 'kcpr.promotion@gmail.com'
      },
      {
         'title' : 'Music Directors',
         'name' : 'Roxanne Hoffman and Alex Penman',
         'description' : 'Our Music Directors sort through new music each week to add into our rotation. They also host the New Releases show where brand new music is highlighted each week. If you are an artist or promoter looking to get your music on KCPR, contact the Music Directors. Please send physical copies to the address on the bottom of this page.',
         'email' : 'kcpr.music@gmail.com'
      },
      {
         'title' : 'Event Directors',
         'name' : 'Annie Vainshtein and Finn Warfield',
         'description' : 'Our Events Director hosts KCPR-sponsored events. If you are a band or promoter who would like to participate in one of our events, the Events team has the information you need.',
         'email' : 'kcpr.events@gmail.com'
      },
      {
         'title' : 'Program Director',
         'name' : 'Connor Griffith',
         'description' : 'Our Program Director schedules KCPR\'s quarterly schedule. They are also in charge of our broadcast quality. If you have a concern about the content on KCPR, please email the Program Director.',
         'email' : 'kcpr.programming@gmail.com'
      },
      {
         'title' : 'Air Staff Instructors',
         'name' : 'Danielle Bonnet and Brad Johnson',
         'description' : 'Our Air Staff Instructors train new DJs. If you have a question about the training process or are interested in joining KCPR, please contact them.',
         'email' : 'kcpr.staff@gmail.com'
      },
      {
         'title' : 'Production Director',
         'name' : 'Chase Welcher',
         'description' : 'Our Production Director schedules public service announcements and underwriting. If you have a community announcement you think KCPR would like to broadcast, contact them with information about the event at least two weeks prior.',
         'email' : 'kcpr.production@gmail.com'
      },
      {
         'title' : 'News & Talk Director',
         'name' : 'Heleni Ramirez',
         'description' : 'Our News & Talk Director oversees all non-music content for our airwaves. If you have an idea for a talk program, comedy show, sports show, or news piece, please reach out to this executive.',
         'email' : 'kcpr.talk@gmail.com'
      },
      {
         'title' : 'Graphic Artist',
         'name' : 'Steven Pardo',
         'description' : 'Our Graphic Artist handles graphics for our promotional materials, including our logo. If you would like to collaborate with our Graphic Artist, please email them.',
         'email' : 'kcpr.graphics@gmail.com'
      },
      {
         'title' : 'Photographer',
         'name' : 'Eric Krikorian',
         'description' : 'Our Photographer documents KCPR events and works in conjunction with our Outreach Director to coordinate event coverage. If you have a photography request, please contact this executive.',
         'email' : 'kcpr.photo@gmail.com'
      },
      {
         'title' : 'Studio Engineer & A/V Technician',
         'name' : 'John Bowers',
         'description' : 'Our Studio Engineer & A/V Technician maintains our technical equipment and handles studio engineering. Please reach out to this executive for technical concerns.',
         'email' : 'jgbowers@calpoly.edu'
      },
      {
         'title' : 'Faculty Advisor',
         'name' : 'Richard Gearhart and Patti Piburn',
         'description' : 'Our advisors represent the station on a faculty level. They advise KCPR executives and DJs and maintain communication between KCPR and the Journalism Department.',
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
