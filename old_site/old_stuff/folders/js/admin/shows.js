window.addEvent('load', function() {
   var manager = new ShowsManager();
});

var ShowsManager = new Class({
   table: new HtmlTable($('showTable')),

   initialize: function() {
      $$('.deleteShow').addEvent('click', function(el) {
         this.deleteShow(el.target);
      }.bind(this));

      $('newShow').addEvent('click', function(el) {
         this.newShow();
      }.bind(this));

      $$('.tabList li').each(function(tab) {
         tab.addEvent('click', function() {
            this.changeActive(tab);
         }.bind(this))
      }.bind(this), this);

   },

   deleteShow: function(el) {
      row = el.getParent('tr');

      if (row != $('prototype')) {
         row.addClass('hidden');
         row.getElement('.deleteFlag').set('value', true);
      }
   },

   newShow: function() {
      newRow = $('prototype').clone();

      newRow.getElement('.deleteShow').addEvent('click', function(el) {
         this.deleteShow(el.target);
      }.bind(this));

      activeType = $$('.active')[0].getParent('li').get('data-typeName');

      // Set selected option to active tab.
      if (activeType != 'all') {
         newRow.getElements('option').each(function(option) {
            if (option.get('data-typeName') == activeType) {
               option.set('selected', true);
            }
         });
      }

      newRow.removeClass('hidden'); 
      newRow.inject($('headerRow'), 'after');
      newRow.highlight();
   },

   changeActive: function(tab) {
      if (!tab.hasClass('active')) {
         $$('.active').each(function(activeTab) {
            activeTab.removeClass('active');
         });

         tab.getElement('a').addClass('active');      
      }

      typeToShow = tab.get('data-typeName');

      if (typeToShow == 'all') {
         $('showTable').getElements('tr').each(function(row) {
            if (row != $('prototype')) {
               row.removeClass('hidden');
            }
         });

      } else {
         $('showTable').getElements('tr').each(function(row) {
            if (row != $('headerRow')) {
               row.addClass('hidden');
            }
         });

         $('showTable').getElements('tr').each(function(row) {
            row.getElements('option').each(function(option) {
               if (option.get('selected') &&
                   option.get('data-typeName') == typeToShow) {
                  row.removeClass('hidden');
               }
            });
         });
      }
   }
});
