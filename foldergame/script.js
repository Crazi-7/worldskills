
var started = false;
var sequence = "";
var index= 0;
var score = 0;
var valin = "";
const btn = document.querySelectorAll(".gamebutton");
animate('l');

function add(x) {
    if (started) { //checks if the game is ongoin
        if (sequence.charAt(index) == x)
        {
            index++; //next char in scanning
            animate(x);
            if (index == sequence.length)
            {
                score++;
                document.querySelector("span").innerHTML = score; //update score
                index = 0;
                playSequence();
            }
        } else {
          
            //animate loss       
            animate('l');
            started = false;
           
        }

    } 
}




function startGame() {
    //
    var input = document.querySelector("input");
    input.disabled  = true;
    valin = input.value;
    console.log(valin);
    started = true;
    sequence = "";
    index = 0;
    score = 0;
    document.querySelector("span").innerHTML = score; //update score
    //disable buttons
    let gameButton = document.getElementsByClassName("gamebutton");
    Array.from(gameButton).forEach(function(element) {
        element.classList.remove('gameover');
       
    });  
    playSequence();  
}






function playSequence() {

    btn.forEach(i => {
        i.disabled  = true;
    });
    //add random
    var rand = 'x';

    switch(Math.floor(Math.random()*4)) {
        case 0:
            rand = 'r';
            break;
        case 1:
            rand = 'g';
            break;
        case 2:
            rand = 'b';
            break;
        case 3:
            rand = 'y';
            break;
    }
    sequence += rand;

    let i = 0;
    let interval = setInterval(function() {
        animate(sequence.charAt(i));
        console.log("sequence" + i);
        i++

        if (i == sequence.length) {
            clearInterval(interval);
        }
        
    }, 1000);

    

    setTimeout(function() {
        btn.forEach(i => {
            i.disabled  = false;
        });
    }, 1000 * sequence.length );
    
    
    
     //enable inputs

}





function animate(x) {

    let audio = document.createElement("audio");

    switch(x) {
        case 'r':
            document.getElementById('red').classList.add('lightup');
            setTimeout(function() {document.getElementById('red').classList.remove('lightup');} , 300);
            audio.src = "sounds/red.mp3";
            break;
        case 'g':
            document.getElementById('green').classList.add('lightup');
            setTimeout(function() {document.getElementById('green').classList.remove('lightup');} , 300);
            audio.src = "sounds/green.mp3";
            break;
        case 'b':
            document.getElementById('blue').classList.add('lightup');
            setTimeout(function() {document.getElementById('blue').classList.remove('lightup');} , 300);
            audio.src = "sounds/blue.mp3";
            break;
        case 'y':
            document.getElementById('yellow').classList.add('lightup');
            setTimeout(function() {document.getElementById('yellow').classList.remove('lightup');} , 300);
            audio.src = "sounds/yellow.mp3";
            break;

        case 'l':
            let gameButton = document.getElementsByClassName("gamebutton");

            Array.from(gameButton).forEach(function(element) {
                element.classList.add('gameover');
                audio.src = "sounds/lose.wav";
            }); 
            break;  
      //loss make it purple
    }
    audio.autoplay = true;
    document.body.appendChild(audio);
    audio.onended = () => {audio.remove()};
}

function loadRanks() {
    let ranking = [ 
        {
            name: "",
            score: 0,
        }, 
        {
            name: "",
            score: 0,
        },
        {
            name: "",
            score: 0,
        }
    ];

    if (localStorage.getItem('rankings')) {
        ranking = localStorage.getItem('rankings');
    } 
    let table = document.getElementsByClassName("tablebody");
    for (var i=0;i<3;i++) {
        table[i].innerHTML = '<td>' + i+1 + '</td>';
        table[i].innerHTML = '<td>' + ranking[i].name + '</td>';
        table[i].innerHTML = '<td>' + ranking[i].score + '</td>';
        
    }
}


function pushScore() {
    let user;
    let score;
    ranking.push([user, score]);
    ranking.sort((a, b) => {return b.score - a.score});
    ranking.pop();
    console.log(ranking);

    // parse ranking to JSON
    console.log(JSON.stringify(ranking));
    localStorage.setItem('rankings', ranking);

    loadRanks();
}