const instruct = document.getElementById("instruct");
const mainmenu = document.getElementById("mainmenu");
const inst= document.getElementById("inst");
const back= document.getElementById("back");
const lev= document.getElementById("lev");
const back1= document.getElementById("back1");
const cred= document.getElementById("cred");
back.addEventListener("click",mainm);
back1.addEventListener("click",mainm1);
instruct.addEventListener("click",instruction);
cred.addEventListener("click",credi);
function credi()
{
mainmenu.style.display="none";
lev.style.display="block";	
}
function instruction()
{
mainmenu.style.display="none";
inst.style.display="block";
}
function mainm()
{
inst.style.display="none";	
mainmenu.style.display="block";
}
function mainm1()
{
lev.style.display="none";	
mainmenu.style.display="block";
}