function begin(){
	document.getElementById('start').style.display = "none";
	document.getElementById('ques1').style.display = "block";
}

var correctAns=0;


function q2(){
	var x=document.getElementById("mc").checked;
	  var quest1=document.getElementById("mc").value;
	  if(x==true){
	if(quest1=="A")
			{correctAns=correctAns+1;}
	}
    var $ques2=$('#ques2');
	document.getElementById('ques1').style.display = "none";
	   $ques2.fadeIn();
	
}

function q3(){
	var x=document.getElementById("mc").checked;
	  var quest2=document.forms.quiz.ques2.value;
	if(x==true){
		if(quest2=="C")
			{correctAns=correctAns+1;}
	}
     var $ques3=$('#ques3');
	document.getElementById('ques2').style.display = "none";
	 $ques3.fadeIn();
}

function q4(){
	var x=document.getElementById("mc").checked;
	  var quest3=document.forms.quiz.ques3.value;
	if(x==true){
		if(quest3=="C")
			{correctAns=correctAns+1;}
	}
      var $ques4=$('#ques4');
	document.getElementById('ques3').style.display = "none";
	  $ques4.fadeIn();
}

function q5(){
	var x=document.getElementById("mc").checked;
	  var quest4=document.forms.quiz.ques4.value;
	if(x==true){
		if(quest4=="B")
			{correctAns=correctAns+1;}
	}
      var $ques5=$('#ques5');
	document.getElementById('ques4').style.display = "none";
	$ques5.fadeIn();
}

function q6(){
	var x=document.getElementById("mc").checked;
	  var quest5=document.forms.quiz.ques5.value;
	  if(x==true){
			if(quest5=="D")
			{correctAns=correctAns+1;}
	}
    var $ques6=$('#ques6');
	document.getElementById('ques5').style.display = "none";
	$ques6.fadeIn();ssssss
}

function q7(){
	var x=document.getElementById("mc").checked;
	  var quest6=document.forms.quiz.ques6.value;
	  if(x==true){
			if(quest6=="B")
			{correctAns=correctAns+1;}
	}
      var $ques7=$('#ques7');
	document.getElementById('ques6').style.display = "none";
	$ques7.fadeIn();
}

function q8(){
	var x=document.getElementById("mc").checked;
	  var quest7=document.forms.quiz.ques7.value;
	if(x==true){
		if(quest7=="B")
			{correctAns=correctAns+1;}
	}
      var $ques8=$('#ques8');
	document.getElementById('ques7').style.display = "none";
	$ques8.fadeIn();
}

function Submit(){
	var x=document.getElementById("mc").checked;
	  var quest8=document.forms.quiz.ques8.value;
	if(x==true){
		if(quest8=="A")
			{correctAns=correctAns+1;}
	}
      var $result=$('#result');
	document.getElementById('ques8').style.display = "none";
	$result.fadeIn();
	document.getElementById('score').innerHTML="You correctly answered "+correctAns+" out of 8 questions."
}