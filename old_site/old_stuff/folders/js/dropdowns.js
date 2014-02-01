window.addEvent('domready', function() {
   var menus = $$('.menu');

   menus.each(function(menu) {
      menu.addEvent('mouseover', function() {
         var ul = this.getFirst('ul');

         if (ul && ul.getStyle('display') == 'none')
               ul.setStyle('display', 'block');
      });

      menu.addEvent('mouseout', function() {
         var ul = this.getFirst('ul');

         if (ul && ul.getStyle('display') == 'block')
            ul.setStyle('display', 'none');
      });
   });



   var submenus = $$('.menu li');
   submenus.each(function(submenu) {
      submenu.addEvent('click', function() {
         var a = this.getElement('a');
         if (a) 
            window.location = a.get('href');
      });
   });
});
