            
var otherStuff = {
   "item 1" : [ "subitem 1.1", "subitem 1.2", "subitem 1.3", "subitem 1.4" ],
   "item 2" : [ "subitem 2.1", "subitem 2.2" ],
   "item 4" : [ "subitem 4" ],
   "item 6" : [ "subitem 6.1", "subitem 6.2" ]
};

function selectAll(listName, selected) {
  var listBox = document.getElementById(listName);
  for(i=0; i<listBox.length; i++) {
    listBox.options[i].selected=selected;
  }
  if( listBox.onchange ) {
    listBox.onchange();
  }
}

function lstStuff_OnChange() {
  var listBox = document.getElementById("lstStuff");
  var subListBox = document.getElementById("lstOtherStuff");
  subListBox.options.length=0;
  for(i=0; i<listBox.length; i++) {
    if( listBox.options[i].selected ) {
      var key = listBox.options[i].text;
      if(otherStuff[key]) {
        for(j=0; j<otherStuff[key].length; j++) {
          subListBox.options.add(new Option(otherStuff[key][j],otherStuff[key][j]));
        }
      }
    }
  }
}

          