const vid1 = document.getElementById("vid1");
const content1 = document.getElementById("content1");
const gmaxv1 = document.getElementById("gmaxv1");
const gminv1 = document.getElementById("gminv1");
const gclosev1 = document.getElementById("gclosev1");

const vid2 = document.getElementById("vid2");
const content2 = document.getElementById("content2");
const gmaxv2 = document.getElementById("gmaxv2");
const gminv2 = document.getElementById("gminv2");
const gclosev2 = document.getElementById("gclosev2");

const vid3 = document.getElementById("vid3");
const content3 = document.getElementById("content3");
const gmaxv3 = document.getElementById("gmaxv3");
const gminv3 = document.getElementById("gminv3");
const gclosev3 = document.getElementById("gclosev3");

const vid4 = document.getElementById("vid4");
const content4 = document.getElementById("content4");
const gmaxv4 = document.getElementById("gmaxv4");
const gminv4 = document.getElementById("gminv4");
const gclosev4 = document.getElementById("gclosev4");

const vid5 = document.getElementById("vid5");
const content5 = document.getElementById("content5");
const gmaxv5 = document.getElementById("gmaxv5");
const gminv5 = document.getElementById("gminv5");
const gclosev5 = document.getElementById("gclosev5");

const vid6 = document.getElementById("vid6");
const content6 = document.getElementById("content6");
const gmaxv6 = document.getElementById("gmaxv6");
const gminv6 = document.getElementById("gminv6");
const gclosev6 = document.getElementById("gclosev6");

const vid7 = document.getElementById("vid7");
const content7 = document.getElementById("content7");
const gmaxv7 = document.getElementById("gmaxv7");
const gminv7 = document.getElementById("gminv7");
const gclosev7 = document.getElementById("gclosev7");

const vid8 = document.getElementById("vid8");
const content8 = document.getElementById("content8");
const gmaxv8 = document.getElementById("gmaxv8");
const gminv8 = document.getElementById("gminv8");
const gclosev8 = document.getElementById("gclosev8");

const ppt = document.getElementById("ppt");
const search = document.getElementById("search");
const filtertext = document.getElementById("filtertext");
const go = document.getElementById("go");
const home = document.getElementById("home");
const match = document.getElementById("match");
const trending = document.getElementById("trending");
const categories = document.getElementById("categories");
const listing = document.getElementById("listing");

var ismax=0;

go.addEventListener("click",lfilter);

home.addEventListener("click",reset);

function reset()
{
	ul = document.getElementById("myul");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) 
    {
        li[i].style.display = "none";
    }
    listing.style.display="none";
    home.style.display="none";
    trending.style.display="block";
	categories.style.display="block";
	search.style.display="";
	ppt.style.display="";
}

function closeall()
{
	closev1();
	closev2();
	closev3();
	closev4();
	closev5();
	closev6();
	closev7();
	closev8();
}

function openv1()
{
	closeall();
	if(ismax==1)
	{
		reset();
	}
	vid1.style.display="block";
	vid1.style.position="fixed";
	vid1.style.width="60%";
	vid1.style.bottom="0px";
	vid1.style.right="0px";
	gmaxv1.style.display="";
	gminv1.style.display="none";
	gclosev1.style.display="";
	content1.style.display="none";
}

function closev1()
{
	vid1.style.display="none";
	jwplayer().pause(true);
}

function maxv1()
{
	trending.style.display="none";
	categories.style.display="none";
	vid1.style.position="static";
	vid1.style.width="100%";
	gmaxv1.style.display="none";
	gminv1.style.display="";
	gclosev1.style.display="none";
	content1.style.display="";
	search.style.display="none";
	ppt.style.display="none";
	listing.style.display="none";
	ismax=1;
}

function minv1()
{
	home.style.display="none";	
	trending.style.display="block";
	categories.style.display="block";
	vid1.style.position="fixed";
	vid1.style.width="60%";
	vid1.style.bottom="0px";
	vid1.style.right="0px";
	gmaxv1.style.display="";
	gminv1.style.display="none";
	gclosev1.style.display="";
	content1.style.display="none";
	search.style.display="";
	ppt.style.display="";
	ismax=0;	
}

function openv2()
{
	closeall();
	if(ismax==1)
	{
		reset();
	}
	vid2.style.display="block";
	vid2.style.position="fixed";
	vid2.style.width="60%";
	vid2.style.bottom="0px";
	vid2.style.right="0px";
	gmaxv2.style.display="";
	gminv2.style.display="none";
	gclosev2.style.display="";
	content2.style.display="none";
}

function closev2()
{
	vid2.style.display="none";
	jwplayer().pause(true);
}

function maxv2()
{
	trending.style.display="none";
	categories.style.display="none";
	vid2.style.position="static";
	vid2.style.width="100%";
	gmaxv2.style.display="none";
	gminv2.style.display="";
	gclosev2.style.display="none";
	content2.style.display="";
	search.style.display="none";
	ppt.style.display="none";
	listing.style.display="none";
	ismax=1;
}

function minv2()
{
	home.style.display="none";	
	trending.style.display="block";
	categories.style.display="block";
	vid2.style.position="fixed";
	vid2.style.width="60%";
	vid2.style.bottom="0px";
	vid2.style.right="0px";
	gmaxv2.style.display="";
	gminv2.style.display="none";
	gclosev2.style.display="";
	content2.style.display="none";
	search.style.display="";
	ppt.style.display="";
	ismax=0;	
}

function openv3()
{
	closeall();
	if(ismax==1)
	{
		reset();
	}
	vid3.style.display="block";
	vid3.style.position="fixed";
	vid3.style.width="60%";
	vid3.style.bottom="0px";
	vid3.style.right="0px";
	gmaxv3.style.display="";
	gminv3.style.display="none";
	gclosev3.style.display="";
	content3.style.display="none";
}

function closev3()
{
	vid3.style.display="none";
	jwplayer().pause(true);
}

function maxv3()
{
	trending.style.display="none";
	categories.style.display="none";
	vid3.style.position="static";
	vid3.style.width="100%";
	gmaxv3.style.display="none";
	gminv3.style.display="";
	gclosev3.style.display="none";
	content3.style.display="";
	search.style.display="none";
	ppt.style.display="none";
	listing.style.display="none";
	ismax=1;
}

function minv3()
{
	home.style.display="none";	
	trending.style.display="block";
	categories.style.display="block";
	vid3.style.position="fixed";
	vid3.style.width="60%";
	vid3.style.bottom="0px";
	vid3.style.right="0px";
	gmaxv3.style.display="";
	gminv3.style.display="none";
	gclosev3.style.display="";
	content3.style.display="none";
	search.style.display="";
	ppt.style.display="";
	ismax=0;	
}

function openv4()
{
	closeall();
	if(ismax==1)
	{
		reset();
	}
	vid4.style.display="block";
	vid4.style.position="fixed";
	vid4.style.width="60%";
	vid4.style.bottom="0px";
	vid4.style.right="0px";
	gmaxv4.style.display="";
	gminv4.style.display="none";
	gclosev4.style.display="";
	content4.style.display="none";
}

function closev4()
{
	vid4.style.display="none";
	jwplayer().pause(true);
}

function maxv4()
{
	trending.style.display="none";
	categories.style.display="none";
	vid4.style.position="static";
	vid4.style.width="100%";
	gmaxv4.style.display="none";
	gminv4.style.display="";
	gclosev4.style.display="none";
	content4.style.display="";
	search.style.display="none";
	ppt.style.display="none";
	listing.style.display="none";
	ismax=1;
}

function minv4()
{
	home.style.display="none";	
	trending.style.display="block";
	categories.style.display="block";
	vid4.style.position="fixed";
	vid4.style.width="60%";
	vid4.style.bottom="0px";
	vid4.style.right="0px";
	gmaxv4.style.display="";
	gminv4.style.display="none";
	gclosev4.style.display="";
	content4.style.display="none";
	search.style.display="";
	ppt.style.display="";
	ismax=0;	
}

function openv5()
{
	closeall();
	if(ismax==1)
	{
		reset();
	}
	vid5.style.display="block";
	vid5.style.position="fixed";
	vid5.style.width="60%";
	vid5.style.bottom="0px";
	vid5.style.right="0px";
	gmaxv5.style.display="";
	gminv5.style.display="none";
	gclosev5.style.display="";
	content5.style.display="none";
}

function closev5()
{
	vid5.style.display="none";
	jwplayer().pause(true);
}

function maxv5()
{
	trending.style.display="none";
	categories.style.display="none";
	vid5.style.position="static";
	vid5.style.width="100%";
	gmaxv5.style.display="none";
	gminv5.style.display="";
	gclosev5.style.display="none";
	content5.style.display="";
	search.style.display="none";
	ppt.style.display="none";
	listing.style.display="none";
	ismax=1;
}

function minv5()
{
	home.style.display="none";	
	trending.style.display="block";
	categories.style.display="block";
	vid5.style.position="fixed";
	vid5.style.width="60%";
	vid5.style.bottom="0px";
	vid5.style.right="0px";
	gmaxv5.style.display="";
	gminv5.style.display="none";
	gclosev5.style.display="";
	content5.style.display="none";
	search.style.display="";
	ppt.style.display="";
	ismax=0;	
}

function openv6()
{
	closeall();
	if(ismax==1)
	{
		reset();
	}
	vid6.style.display="block";
	vid6.style.position="fixed";
	vid6.style.width="60%";
	vid6.style.bottom="0px";
	vid6.style.right="0px";
	gmaxv6.style.display="";
	gminv6.style.display="none";
	gclosev6.style.display="";
	content6.style.display="none";
}

function closev6()
{
	vid6.style.display="none";
	jwplayer().pause(true);
}

function maxv6()
{
	trending.style.display="none";
	categories.style.display="none";
	vid6.style.position="static";
	vid6.style.width="100%";
	gmaxv6.style.display="none";
	gminv6.style.display="";
	gclosev6.style.display="none";
	content6.style.display="";
	search.style.display="none";
	ppt.style.display="none";
	listing.style.display="none";
	ismax=1;
}

function minv6()
{
	home.style.display="none";	
	trending.style.display="block";
	categories.style.display="block";
	vid6.style.position="fixed";
	vid6.style.width="60%";
	vid6.style.bottom="0px";
	vid6.style.right="0px";
	gmaxv6.style.display="";
	gminv6.style.display="none";
	gclosev6.style.display="";
	content6.style.display="none";
	search.style.display="";
	ppt.style.display="";
	ismax=0;	
}

function openv7()
{
	closeall();
	if(ismax==1)
	{
		reset();
	}
	vid7.style.display="block";
	vid7.style.position="fixed";
	vid7.style.width="60%";
	vid7.style.bottom="0px";
	vid7.style.right="0px";
	gmaxv7.style.display="";
	gminv7.style.display="none";
	gclosev7.style.display="";
	content7.style.display="none";
}

function closev7()
{
	vid7.style.display="none";
	jwplayer().pause(true);
}

function maxv7()
{
	trending.style.display="none";
	categories.style.display="none";
	vid7.style.position="static";
	vid7.style.width="100%";
	gmaxv7.style.display="none";
	gminv7.style.display="";
	gclosev7.style.display="none";
	content7.style.display="";
	search.style.display="none";
	ppt.style.display="none";
	listing.style.display="none";
	ismax=1;
}

function minv7()
{
	home.style.display="none";	
	trending.style.display="block";
	categories.style.display="block";
	vid7.style.position="fixed";
	vid7.style.width="60%";
	vid7.style.bottom="0px";
	vid7.style.right="0px";
	gmaxv7.style.display="";
	gminv7.style.display="none";
	gclosev7.style.display="";
	content7.style.display="none";
	search.style.display="";
	ppt.style.display="";
	ismax=0;	
}

function openv8()
{
	closeall();
	if(ismax==1)
	{
		reset();
	}
	vid8.style.display="block";
	vid8.style.position="fixed";
	vid8.style.width="60%";
	vid8.style.bottom="0px";
	vid8.style.right="0px";
	gmaxv8.style.display="";
	gminv8.style.display="none";
	gclosev8.style.display="";
	content8.style.display="none";
}

function closev8()
{
	vid8.style.display="none";
	jwplayer().pause(true);
}

function maxv8()
{
	trending.style.display="none";
	categories.style.display="none";
	vid8.style.position="static";
	vid8.style.width="100%";
	gmaxv8.style.display="none";
	gminv8.style.display="";
	gclosev8.style.display="none";
	content8.style.display="";
	search.style.display="none";
	ppt.style.display="none";
	listing.style.display="none";
	ismax=1;
}

function minv8()
{
	home.style.display="none";	
	trending.style.display="block";
	categories.style.display="block";
	vid8.style.position="fixed";
	vid8.style.width="60%";
	vid8.style.bottom="0px";
	vid8.style.right="0px";
	gmaxv8.style.display="";
	gminv8.style.display="none";
	gclosev8.style.display="";
	content8.style.display="none";
	search.style.display="";
	ppt.style.display="";
	ismax=0;	
}

function ini()
{
	ul = document.getElementById("myul");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) 
    {
        li[i].style.display = "none";
    }
    listing.style.display="none";
    home.style.display="none";
    vid1.style.display="none";
    vid2.style.display="none";
    vid3.style.display="none";
    vid4.style.display="none";
    vid5.style.display="none";
    vid6.style.display="none";
    vid7.style.display="none";
    vid8.style.display="none";
}

ini();

function lfilter() 
{
	var no=0;
	home.style.display="";	
	trending.style.display="none";
	categories.style.display="none";
	listing.style.display="block";
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("filtertext");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myul");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("div")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) 
        {
        	no++;
            li[i].style.display = "block";
        } 
        else 
        {
            li[i].style.display = "none";
        }
    }
    match.innerHTML="Matches found: "+no;
}

function kha()
{
	home.style.display="";	
	trending.style.display="none";
	categories.style.display="none";
	listing.style.display="block";
	var input, filter, ul, li, a, i, txtValue;
	ul = document.getElementById("myul");
    li = ul.getElementsByTagName("li");
    li[0].style.display = "block";	
}

function conc()
{
	home.style.display="";	
	trending.style.display="none";
	categories.style.display="none";
	listing.style.display="block";
	var input, filter, ul, li, a, i, txtValue;
	ul = document.getElementById("myul");
    li = ul.getElementsByTagName("li");
    li[4].style.display = "block";	
}

function srij()
{
	home.style.display="";	
	trending.style.display="none";
	categories.style.display="none";
	listing.style.display="block";
	var input, filter, ul, li, a, i, txtValue;
	ul = document.getElementById("myul");
    li = ul.getElementsByTagName("li");
    li[5].style.display = "block";
    li[6].style.display = "block";
    li[7].style.display = "block";	
}

function basa()
{
	home.style.display="";	
	trending.style.display="none";
	categories.style.display="none";
	listing.style.display="block";
	var input, filter, ul, li, a, i, txtValue;
	ul = document.getElementById("myul");
    li = ul.getElementsByTagName("li");
    li[2].style.display = "block";
    li[3].style.display = "block";	
}

function ismmm()
{
	home.style.display="";	
	trending.style.display="none";
	categories.style.display="none";
	listing.style.display="block";
	var input, filter, ul, li, a, i, txtValue;
	ul = document.getElementById("myul");
    li = ul.getElementsByTagName("li");
    li[1].style.display = "block";	
}