var clickTime;
 var createdTime;
 var reactionTime;
 var color;
 	

function getRandomColor(){
	var letters= '0123456789ABCDEF'.split('');
	var color = '#';
	for (var i = 0; i < 6; i++){
		color += letters[Math.round(Math.random() * 15)];
	}
	return color;
}

function getShape(){
	flag = Math.round(Math.random())
 	if(flag == 0){
		document.getElementById("box").style.borderRadius = "90px";
	}
	else{
		document.getElementById("box").style.borderRadius="0px";
	}
}

function getPosition(){
 	var top = Math.random();
	top = top*300;

	var left = Math.random();
	left = left*500;

	document.getElementById("box").style.top=top+"px";
	document.getElementById("box").style.top=left+"px";
}

function makeBox(){
	var time = Math.random()*5000;
 	setTimeout(function(){
 		newColor = getRandomColor();
 		getShape();
 		getPosition();

		document.getElementById("box").style.backgroundColor=newColor;
		document.getElementById("box").style.display="block";
		createdTime = Date.now();
	}, time);
}

document.getElementById("box").onclick=function(){
	clickTime = Date.now();
	reactionTime = (clickTime - createdTime) /1000;
	document.getElementById("text").innerHTML=reactionTime;
	this.style.display="none";
	makeBox();
}

 makeBox();