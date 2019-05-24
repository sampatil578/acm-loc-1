
const start = document.getElementById("start");
const quiz = document.getElementById("quiz");
const question = document.getElementById("question");
const qImg = document.getElementById("qImg");
const choiceA = document.getElementById("A");
const choiceB = document.getElementById("B");
const choiceC = document.getElementById("C");
const counter = document.getElementById("counter");
const btimeGauge = document.getElementById("btimeGauge");
const timeGauge = document.getElementById("timeGauge");
const progress = document.getElementById("progress");
const scoreDiv = document.getElementById("scoreContainer");


let questions = [
    {
        question : "What does HTML stand for?",
        imgSrc : "img/html.png",
        choiceA : "Correct",
        choiceB : "Wrong",
        choiceC : "Wrong",
        correct : "A"
    },{
        question : "What does CSS stand for?",
        imgSrc : "img/html.png",
        choiceA : "Wrong",
        choiceB : "Correct",
        choiceC : "Wrong",
        correct : "B"
    },{
        question : "What does JS stand for?",
        imgSrc : "img/html.png",
        choiceA : "Wrong",
        choiceB : "Wrong",
        choiceC : "Correct",
        correct : "C"
    },
    {
        question : "What does JS stand for?",
        imgSrc : "img/html.png",
        choiceA : "Wrong",
        choiceB : "Wrong",
        choiceC : "Correct",
        correct : "C"
    }
];



const lastQuestion = questions.length - 1;
let runningQuestion = 0;
let count = 0;
const questionTime = 10; 
const gaugeWidth = 150; 
const gaugeUnit = gaugeWidth / questionTime;
let TIMER;
let score = 0;

function renderQuestion(){
    let q = questions[runningQuestion];
    quiz.style.display = "none";
    question.innerHTML = "<p>"+ q.question +"</p>";
    qImg.innerHTML = "<img src="+ q.imgSrc +" style='border:2px solid black' class='img-circle'>";
    choiceA.innerHTML = "<h3>"+q.choiceA+"</h3>";
    choiceB.innerHTML = "<h3>"+q.choiceB+"</h3>";
    choiceC.innerHTML = "<h3>"+q.choiceC+"</h3>";
    quiz.style.display = "block";
}

start.addEventListener("click",startQuiz);

function startQuiz(){
    start.style.display = "none";
    renderQuestion();
    quiz.style.display = "block";
    renderProgress();
    renderCounter();
    TIMER = setInterval(renderCounter,1000); 
}


function renderProgress(){
    for(let qIndex = 0; qIndex <= lastQuestion; qIndex++){
        progress.innerHTML += "<div class='prog' id="+ qIndex +"></div>";
    }
}



function renderCounter(){
    if(count <= questionTime){
        counter.innerHTML = count;
        if(count*gaugeUnit>=100)
            timeGauge.style.backgroundColor="red";
        timeGauge.style.width = count * gaugeUnit + "px";
        count++
    }else{
        count = 0
        timeGauge.style.backgroundColor="mediumseagreen";
        answerIsWrong();
        if(runningQuestion < lastQuestion){
            runningQuestion++;
            renderQuestion();
        }else{
            clearInterval(TIMER);
            scoreRender();
        }
    }
}


function checkAnswer(answer){
    if( answer == questions[runningQuestion].correct){

        score++;

        answerIsCorrect();
    }else{
        answerIsWrong();
    }
    count = 0;
    timeGauge.style.backgroundColor="mediumseagreen";
    if(runningQuestion < lastQuestion){
        runningQuestion++;
        renderQuestion();
    }else{
        clearInterval(TIMER);
        scoreRender();
    }
}


function answerIsCorrect(){
    document.getElementById(runningQuestion).style.backgroundColor = "#0f0";
}


function answerIsWrong(){
    document.getElementById(runningQuestion).style.backgroundColor = "#f00";
}

function scoreRender(){
    quiz.style.display = "none";
    scoreDiv.style.display = "block";
    

    const scorePerCent = Math.round(100 * score/questions.length);
    
    let img = (scorePerCent >= 80) ? "img/5.png" :
              (scorePerCent >= 60) ? "img/4.png" :
              (scorePerCent >= 40) ? "img/3.png" :
              (scorePerCent >= 20) ? "img/2.png" :
              "img/1.png";
    scoreDiv.innerHTML = "<h1>Results</h1>";
    scoreDiv.innerHTML += "<img src="+ img +" class='rotate'>";
    scoreDiv.innerHTML += "<h2>Percentage:"+ scorePerCent +"%</h2>";
    scoreDiv.innerHTML += "<a href='test.html'><button class='btn btn-lg' style='background-color: red'>Retry</button></a><br>";
    scoreDiv.innerHTML += "<a href='mainmenu.html'><button class='btn btn-lg' style='background-color: red'>Main Menu</button></a>";
}





















