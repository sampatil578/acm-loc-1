function myFunction(m){
  var ed = document.getElementById("ed");
  if(m===9){
	if(ed.getElementsByClassName("eds")[0].style.display === "none"){
  		ed.getElementsByClassName("eds")[0].style.display = "block";
  	}
  	else{
  		ed.getElementsByClassName("eds")[0].style.display = "none";
  	}
}

if(m===10){
	if(ed.getElementsByClassName("eds")[1].style.display === "none"){
  		ed.getElementsByClassName("eds")[1].style.display = "block";
  	}
  	else{
  		ed.getElementsByClassName("eds")[1].style.display = "none";
  	}
}

if(m===11){
	if(ed.getElementsByClassName("eds")[2].style.display === "none"){
  		ed.getElementsByClassName("eds")[2].style.display = "block";
  	}
  	else{
  		ed.getElementsByClassName("eds")[2].style.display = "none";
  	}
}
}