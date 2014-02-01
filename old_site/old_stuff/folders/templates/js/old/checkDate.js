function checkDate(form) {
      var day = form.day.value;
      var month = form.month.value;
      var year = form.year.value;
      
      if (day.length != 2 || month.length != 2 || year.length != 2) {
         alert("The dates need to be two digit numbers each.");
         return false;
      }
      return true;
}
   


