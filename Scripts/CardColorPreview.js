function CardColorPreview() {
  var splitThis = document.getElementById('BuyCard').value;
  var splitDone = splitThis.split(" | ");
  var useMe = splitDone[2];
  var frame = document.getElementsByClassName('bigPicWrap');
  
  switch(useMe) {
	  case "Black":
	    frame.style.backgroundColor = "#000000";
	    break;
	  case "Red":
	    frame.style.backgroundColor = "#ff0000";
	    break;
	  case "Burgundy":
	    frame.style.backgroundColor = "#800000";
	    break;
	  case "BtOrange":
	    frame.style.backgroundColor = "orangered";
	    break;
	  case "Orange":
	    frame.style.backgroundColor = "coral";
	    break;
	  case "Yellow":
	    frame.style.backgroundColor = "#ffff00";
	    break;
	  case "DkGreen":
	    frame.style.backgroundColor = "#006400";
	    break;
	  case "LtGreen":
	    frame.style.backgroundColor = "#808000";
	    break;
	  case "DkBlue":
	    frame.style.backgroundColor = "#000080";
	    break;
	  case "LtBlue":
	    frame.style.backgroundColor = "#add836";
	    break; 
	  case "Purple":
	    frame.style.backgroundColor = "#800080";
	    break;
	  case "White":
	    frame.style.backgroundColor = "#ffffff";
	    break;
	  case "Silver":
	    frame.style.backgroundColor = "#c0c0c0";
	    break;
	  case "Grey":
	    frame.style.backgroundColor = "#808080";
	    break;
	  case "Brown": 
	    frame.style.backgroundColor = "#8b4513";
	    break;
	  case "Tan":
	    frame.style.backgroundColor = "#cd853f";
	    break;
	  case "BtPink":
	    frame.style.backgroundColor = "#ff69b4";
	    break;
	  case "Pink":
	    frame.style.backgroundColor = "pink";
	    break;  	  
  } //ends my switch
} //ends my function
