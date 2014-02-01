function myPost(page, data) {
   var myForm = document.createElement('form');
   myForm.method = 'post';
   myForm.action = page;
   for (var key in data) {
      var myInput = document.createElement('input');
      myInput.setAttribute('name', key);
      myInput.setAttribute('value', data[key]);
      myForm.appendChild(myInput);
   }
   document.body.appendChild(myForm);
   myForm.submit();
   document.body.removeChild(myForm);
}
