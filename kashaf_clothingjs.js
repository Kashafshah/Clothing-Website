

function openClothing(evt, clothingName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].clothingName = tablinks[i].clothingName.replace(" active", "");
  }
  document.getElementById(clothingName).style.display = "block";
  evt.currentTarget.clothingName += " active";
}

function ShowItem (itemID) {
  var x = document.getElementById(itemID);
  if (x)
    x.style.visibility = "visible";
  return true;
}