var ItemManager = new Class({
   Extends: Options,

   inputField: null,
   outputList: null,
   options: {
      inputForm: $('inputForm'),
      outputForm: $('outputForm'),
      addFn: function(form, newID) { // Turns input form data into Element
         return new Element('span', {
            'html': form.getElement('input').get('value'),
            'data-id' : newID
         });
      }
   },

   initialize: function(options) {
      this.setOptions(options);
      this.inputField = this.options.inputForm.getElement('input');
      this.outputList = this.options.outputForm.getElement('ul');
      this.newID = 0; // unique (to this form) id to assign to fields.

      this.outputList.getElements('li').each(function(item) {
         var id = 'item' + item.get('data-id');
         var deleteThese = $(id);
         var del = new Element('a', {
            'events': {
               'click': function() {
                  if (!item.hasClass('deleted')) {
                     deleteThese.dispose();
                     del.set('html', '&nbsp[+]');
                  } else {
                     this.options.outputForm.adopt(deleteThese);
                     del.set('html', '&nbsp[x]');
                  }
                  item.toggleClass('deleted');
               }.bind(this)
            },
            'styles': {'cursor': 'pointer'},
            'html': '&nbsp;[x]'
         });

         item.adopt(del, 'after');
      }.bind(this));
      
      // When add is clicked, create new fields in the output form,
      // and show the added item.
      this.options.inputForm.addEvent('submit', function(ev) {
         new Event(ev).stop().preventDefault(); // don't submit!
         
         var fields = this.options.inputForm.getElements('input');
         fields.extend(this.options.inputForm.getElements('select'));

         var inputs = [];
         this.newID++;
         fields.each(function(field) {
            var input = new Element('input', {
               'type': 'text',
               'styles': {'display': 'none'},
               'name':  this.options.inputForm.get('name') 
                 + '[new' + this.newID + ']'
                 + '['  + field.get('name') + ']',
               'value': field.get('value')
            });

            this.options.outputForm.adopt(input);
            inputs.push(input);
         }.bind(this));

         var text = new Element('li', {
            'class': 'item'
         });

         // This function is customizable!
         var fancyItem = this.options.addFn(this.options.inputForm, 
          'new' + this.newID);
         text.adopt(fancyItem);

         var del = new Element('a', {
            'events': {
               'click': function() {
                  if (!text.hasClass('deleted')) {
                     inputs.each(function(input) {
                        input.dispose();
                     });
                     del.set('html', '&nbsp[+]');
                  } else {
                     inputs.each(function(input) {
                        this.options.outputForm.adopt(input);
                     }.bind(this));
                     del.set('html', '&nbsp[x]');
                  }
                  text.toggleClass('deleted');
               }.bind(this)
            },
            'styles': {'cursor': 'pointer'},
            'html': '&nbsp;[x]'
         });

         text.adopt(del, 'after');

         this.options.inputForm.reset();
         this.outputList.adopt(text);
         text.highlight();
      }.bind(this));
   }
});
