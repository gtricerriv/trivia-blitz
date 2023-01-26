<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/quest.css') }}" ></head>
    <title>Document</title>
</head>
<body>
 <div class='parent'>
  <div class='slider'>

   <svg id='svg2' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <circle id='circle1' class='circle1 steap' cx="34px" cy="49%" r="20"  />
      <circle id='circle2' class='circle2 steap' cx="34px" cy="49%" r="100"  />
      <circle id='circle3' class='circle3 steap' cx="34px" cy="49%" r="180"  />
      <circle id='circle4' class='circle4 steap' cx="34px" cy="49%" r="260"  />
      <circle id='circle5' class='circle5 steap' cx="34px" cy="49%" r="340"  />
      <circle id='circle6' class='circle6 steap' cx="34px" cy="49%" r="420"  />
      <circle id='circle7' class='circle7 steap' cx="34px" cy="49%" r="500"  />
      <circle id='circle8' class='circle8 steap' cx="34px" cy="49%" r="580"  />
      <circle id='circle9' class='circle9 steap' cx="34px" cy="49%" r="660"  />
    </svg>
   <svg id='svg1' class='up2' xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <circle id='circle10' class='circle10 steap' cx="648px" cy="49%" r="20"  />
      <circle id='circle11' class='circle11 steap' cx="648px" cy="49%" r="100"  />
      <circle id='circle12' class='circle12 steap' cx="648px" cy="49%" r="180"  />
      <circle id='circle13' class='circle13 steap' cx="648px" cy="49%" r="260"  />
      <circle id='circle14' class='circle14 steap' cx="648px" cy="49%" r="340"  />
      <circle id='circle15' class='circle15 steap' cx="648px" cy="49%" r="420"  />
      <circle id='circle16' class='circle16 steap' cx="648px" cy="49%" r="500"  />
      <circle id='circle17' class='circle17 steap' cx="648px" cy="49%" r="580"  />
      <circle id='circle18' class='circle18 steap' cx="648px" cy="49%" r="660"  />
    </svg>
   <div id='slide1' class='slide1 up1'>
    <div id="category"></div>
    <div id="question"></div>
    <div class="anwser">
        <div class="anwser-option btn">TRUE</div>
        <div class="anwser-option btn">FALSE</div>
    </div>
   </div>
  </div>
 </div>

 <script>
    var curpage = 1;
var sliding = false;
var click = true;
var left = document.getElementById("left");
var right = document.getElementById("right");
var pagePrefix = "slide";
var pageShift = 500;
var transitionPrefix = "circle";
var svg = true;
var data;
var quest = {
            category: "General Knowledge",
            type: "boolean",
            difficulty: "easy",
            question: "It is automatically considered entrapment in the United States if the police sell you illegal substances without revealing themselves.",
            correct_answer: "False",
            incorrect_answers: [
                "True"
            ]
        }
var slide = document.getElementById('slide1')
var category = document.getElementById('category')
var question = document.getElementById('question')
var answer = document.getElementById('answer')

category.innerHTML = quest.category
question.innerHTML = quest.question

getQuestions()

async function getQuestions(){
    var requestOptions = {
  method: 'GET',
  redirect: 'follow'
};

await fetch("http://localhost:8000/api/questions?amount=10&category=9&difficulty=easy&type=boolean", requestOptions)
  .then(response => response.text())
  .then(result => {
    data = result
    
  })
  .catch(error => console.log('error', error));
}

function leftSlide() {
	if (click) {
		if (curpage == 1) curpage = 5;
		console.log("woek");
		sliding = true;
		curpage--;
		svg = true;
		click = false;
		for (k = 1; k <= 4; k++) {
			var a1 = document.getElementById(pagePrefix + k);
			a1.className += " tran";
		}
		setTimeout(() => {
			move();
		}, 200);
		setTimeout(() => {
			for (k = 1; k <= 4; k++) {
				var a1 = document.getElementById(pagePrefix + k);
				a1.classList.remove("tran");
			}
		}, 1400);
	}
}

function rightSlide() {
	if (click) {
		if (curpage == 4) curpage = 0;
		console.log("woek");
		sliding = true;
		curpage++;
		svg = false;
		click = false;
		for (k = 1; k <= 4; k++) {
			var a1 = document.getElementById(pagePrefix + k);
			a1.className += " tran";
		}
		setTimeout(() => {
			move();
		}, 200);
		setTimeout(() => {
			for (k = 1; k <= 4; k++) {
				var a1 = document.getElementById(pagePrefix + k);
				a1.classList.remove("tran");
			}
		}, 1400);
	}
}

function move() {
	if (sliding) {
		sliding = false;
		if (svg) {
			for (j = 1; j <= 9; j++) {
				var c = document.getElementById(transitionPrefix + j);
				c.classList.remove("steap");
				c.setAttribute("class", transitionPrefix + j + " streak");
				console.log("streak");
			}
		} else {
			for (j = 10; j <= 18; j++) {
				var c = document.getElementById(transitionPrefix + j);
				c.classList.remove("steap");
				c.setAttribute("class", transitionPrefix + j + " streak");
				console.log("streak");
			}
		}
		setTimeout(() => {

			sliding = true;
		}, 600);
		setTimeout(() => {
			click = true;
		}, 1700);

		setTimeout(() => {
			if (svg) {
				for (j = 1; j <= 9; j++) {
					var c = document.getElementById(transitionPrefix + j);
					c.classList.remove("streak");
					c.setAttribute("class", transitionPrefix + j + " steap");
				}
			} else {
				for (j = 10; j <= 18; j++) {
					var c = document.getElementById(transitionPrefix + j);
					c.classList.remove("streak");
					c.setAttribute("class", transitionPrefix + j + " steap");
				}
				sliding = true;
			}
		}, 850);
		setTimeout(() => {
			click = true;
		}, 1700);
	}
}

left.onmousedown = () => {
	leftSlide();
};

right.onmousedown = () => {
	rightSlide();
};

document.onkeydown = e => {
	if (e.keyCode == 37) {
		leftSlide();
	} else if (e.keyCode == 39) {
		rightSlide();
	}
};

//for codepen header
// setTimeout(() => {
// 	rightSlide();
// }, 500);

 </script>
</body>
</html>