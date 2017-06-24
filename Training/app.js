

    var counter = 0;
    var quotes = ["Hello there", "Hi again", "This is getting boring", "Stop it now!!!", "Why do you do that?","I am just going to ignore you now", "..."]
    
    var end = quotes.length -1;
    function changeText(){
        if (counter == end){
            counter= 0;
        }else{
            counter++;
        }document.getElementById('cham').innerHTML=quotes[counter];
            console.dir(counter);
    }
        