var counter = 1;
setInterval(function(){
    document.getElementById("btn" + counter).checked = true ;
    counter++
    if(counter > 4){
        counter = 1;
    }
}, 7000);