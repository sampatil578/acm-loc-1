
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
        question : "What is the tallest statue on earth called?",
        imgSrc : "img/tallest.jpg",
        choiceA : "Statue of Liberty",
        choiceB : "Statue of Unity",
        choiceC : "Statue of Courage",
        correct : "B"
    },{
        question : "Which gland in human body acts both as an endocrine and an exocrine gland?",
        imgSrc : "img/pancreas.jpg",
        choiceA : "Pituitary Gland",
        choiceB : "Pancreas",
        choiceC : "Thyroid Gland",
        correct : "B"
    },{
        question : "Identify the compound.",
        imgSrc : "img/tnt.png",
        choiceA : "Laughing Gas",
        choiceB : "D.D.T.",
        choiceC : "T.N.T.",
        correct : "C"
    },
    {
        question : "What is the height of Mt. Everest?",
        imgSrc : "img/everest.jpg",
        choiceA : "8850m",
        choiceB : "8950m",
        choiceC : "8750m",
        correct : "A"
    },
    {
        question : "In the structure of Diamond each carbon atom is attached to how many carbon atoms....",
        imgSrc : "img/diamond.jpg",
        choiceA : "4",
        choiceB : "3",
        choiceC : "5",
        correct : "A"
    },
    {
        question : "What is the name of India's only active volcano?",
        imgSrc : "img/nar.jpg",
        choiceA : "Mt. Fuji",
        choiceB : "Narcondam",
        choiceC : "Mt. Etna",
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
    scoreDiv.innerHTML += "<a href='quiz5.html'><button class='btn btn-lg' style='background-color: red'>Retry</button></a><br>";
    scoreDiv.innerHTML += "<a href='mainmenu.html'><button class='btn btn-lg' style='background-color: red'>Main Menu</button></a>";
}





















