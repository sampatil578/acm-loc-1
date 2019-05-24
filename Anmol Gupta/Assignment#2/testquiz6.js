
const start = document.getElementById("start");
const quiz = document.getElementById("quiz");
const question = document.getElementById("question");
const qImg = document.getElementById("qImg");
const choiceA = document.getElementById("A");
const choiceB = document.getElementById("B");
const choiceC = document.getElementById("C");
const progress = document.getElementById("progress");
const scoreDiv = document.getElementById("scoreContainer");


let questions = [
    {
        question : "On which day man landed first time on the Moon?",
        imgSrc : "img/landing.jpg",
        choiceA : "July 20, 1979",
        choiceB : "July 20, 1969",
        choiceC : "July 20, 1965",
        correct : "B"
    },{
        question : "Which was the first horcrux to be destroyed in Harry Potter sereis?",
        imgSrc : "img/harry.jfif",
        choiceA : "Marvolo Gaunt's ring",
        choiceB : "Tom Riddle's diary",
        choiceC : "Rowena Ravenclaw's diadem",
        correct : "B"
    },{
        question : "Where is the longest railway station in India located?",
        imgSrc : "img/gorakpur.jpg",
        choiceA : "Allahbad",
        choiceB : "Kharagpur",
        choiceC : "Gorakpur",
        correct : "C"
    },
    {
        question : "When did the Battle of Plassey took place?",
        imgSrc : "img/battle.jpg",
        choiceA : "23 June 1757",
        choiceB : "24 June 1757",
        choiceC : "25 June 1757",
        correct : "A"
    },
    {
        question : "In the C++ S.T.L.,unordered_map is implemented using....",
        imgSrc : "img/cpp.jpg",
        choiceA : "Hash Table",
        choiceB : "Red Black Binary Search Tree",
        choiceC : "Stack",
        correct : "A"
    },
    {
        question : "What is the date of birth of Atal Bihari Vajpayee?",
        imgSrc : "img/atal.jfif",
        choiceA : "26 December 1924",
        choiceB : "25 December 1924",
        choiceC : "24 December 1924",
        correct : "B"
    }
];



const lastQuestion = questions.length - 1;
let runningQuestion = 0;
let TIMER;
let score = 0;

function renderQuestion(){
    let q = questions[runningQuestion];
    quiz.style.display = "none";
    question.innerHTML = "<p>"+ q.question +"</p>";
    qImg.innerHTML = "<img src="+ q.imgSrc +" style='border:2px solid black' class='img-circle' width='280px'>";
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
}


function renderProgress(){
    for(let qIndex = 0; qIndex <= lastQuestion; qIndex++){
        progress.innerHTML += "<div class='prog' id="+ qIndex +"></div>";
    }
}






function checkAnswer(answer){
    if( answer == questions[runningQuestion].correct){

        score++;

        answerIsCorrect();
    }else{
        answerIsWrong();
    }
    if(runningQuestion < lastQuestion){
        runningQuestion++;
        renderQuestion();
    }else{
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
    scoreDiv.innerHTML += "<a href='quiz6.html'><button class='btn btn-lg' style='background-color: red'>Retry</button></a><br>";
    scoreDiv.innerHTML += "<a href='mainmenu.html'><button class='btn btn-lg' style='background-color: red'>Main Menu</button></a>";
}





















