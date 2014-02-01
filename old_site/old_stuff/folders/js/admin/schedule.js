window.addEvent('load', function() {
   var manager = new ScheduleManager(); 

   new DatePicker('.picker', {
      timePicker: true,
      timePickerOnly: true,
      format: 'G:i',
      inputOutputFormat: 'G:i',
      onSelect: function() {
         manager.newTime();
      }
   });
});

var ScheduleManager = new Class({
   initialize: function() {
      $$('.del').each(function(el) {
         el.addEvent('click', function() {
            var row = el.getParent('tr');
            this.deleteTime(row);
         }.bind(this));
      }.bind(this));

      $('clearButton').addEvent('click', function(ev) {
         if (alert("Clear show assignments?")) {
            $('scheduleForm').reset();
         }
      });
   },

   deleteTime: function(row) {
      row.getElements('.deleteFlag').each(function(flag) {
         flag.set('value', 'true');
      });
      row.addClass('hidden');
   },

   newTime: function() {
      var time = $('timeButton').get('value');

      var checkRow;
      var notExists = $$('tr.time').every(function(el) {
         checkRow = el;
         return el.get('data-time') != time;
      });

      if (!notExists) {
         // Check if the existing row for that time is a hidden one 
         // (from being deleted). 
         if (checkRow.hasClass('hidden')) {
            // Just show the old row. 
            checkRow.getElements('.deleteFlag').each(function(flag) {
               flag.set('value', 'false');
            });
            checkRow.removeClass('hidden');

         } else {
            alert('A row already exists for that time!');
         }

         return;
      }
         
      var newRow = $('prototype').clone();
      newRow.removeClass('hidden');

      // Add event for new row's delete button.

      newRow.getElement('.delLink').addEvent('click', function(el) {
         this.deleteTime(newRow);
      }.bind(this));

      // Set time text and data to new time. 
      newRow.set('data-time', time);

      newRow.getChildren('.time').each(function(col) {
         col.set('html', time); 
      });
      
      // Set form input names based on new time and the day.
      var dayColumns = newRow.getElements('.day');
      dayColumns.each(function(col) {
         var select = col.getElement('select');
         var deleteFlag = col.getElement('.deleteFlag');
         var idHolder = col.getElement('.idPlaceholder');
         var day = col.get('data-day');

         select.set('name', 'schedule[' + time + '][' + day + '][showid]');
         deleteFlag.set('name', 'schedule[' + time + '][' + day + '][delete]');
         idHolder.set('name', 'schedule[' + time + '][' + day + '][id]');
      });

      // Insert the row so the times are still sorted.
      var insertAfter = null;

      // midnight appears on top
      var compare = function(time1, time2) {
         if (time1 == null) // silly hack to fix off by one bug
            return false;

         var num1 = parseInt(time1.replace(":", ""));
         var num2 = parseInt(time2.replace(":", ""));
         console.log(num1);
         console.log(num2);

         if (num1 < 100 && num2 >= 100)
            return false;
         else if (num2 < 100 && num1 >= 100)
            return true;
         else
            return num1 < num2;
      };

      $$('tr.time').every(function(el) {
         if (compare(el.get('data-time'), time)) {
            insertAfter = el;
            return true;
         } else {
            return false;
         }
      });

      if (insertAfter == null) 
         $('schedule').getElement('#days').grab(newRow, 'after'); 
      else
         newRow.inject(insertAfter, 'after');

      newRow.highlight();

   }
});
