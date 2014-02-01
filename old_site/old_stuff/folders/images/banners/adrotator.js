function AdRotator(imgTagNameAttribute, adURLs, adImageURLs, rotationTime,
  adRotatorVarName) {
 this.imgTagNameAttribute = imgTagNameAttribute
 this.adURLs = adURLs
 this.adImageURLs = adImageURLs
 this.rotationTime = rotationTime
 this.adRotatorVarName = adRotatorVarName
 this.index = 0
 this.adImages = new Array(adImageURLs.length)
 for(var i=0; i<adImageURLs.length; ++i) {
  this.adImages[i] = new Image()
  this.adImages[i].src = adImageURLs[i]
 }
 this.writeHTML = AdRotator_writeHTML
 this.start = AdRotator_start
 this.rotate = AdRotator_rotate
 this.handleClick = AdRotator_handleClick
}

function AdRotator_writeHTML() {
 document.write('<p align="center">')
 document.write('<a href="'+this.adURLs[0]+'" ')
 document.write('onclick="'+this.adRotatorVarName+'.handleClick()">')
 document.write('<img name="'+this.imgTagNameAttribute+'" height="60" width="468" border="0" ')
 document.write('src="'+this.adImageURLs[0]+'">')
 document.write('</a></p>')
}

function AdRotator_start() {
 window.setInterval(this.adRotatorVarName + '.rotate()', this.rotationTime)
}

function AdRotator_rotate() {
 ++this.index
 this.index %= this.adImageURLs.length
 document.images[this.imgTagNameAttribute].src = this.adImages[this.index].src
}

function AdRotator_handleClick() {
 setTimeout("window.location.href = '"+this.adURLs[this.index]+"'",500)
}


