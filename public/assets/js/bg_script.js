$('.bg').css("background-image", "url(../assets/images/bg/bg" + randomIntFromInterval(1, 10) + ".png)");  
			
function randomIntFromInterval(min,max)
{
    let result =  Math.floor(Math.random()*(max-min+1)+min);
    if(result < min){
        result = min;
    }
    else if(result > max){
        result = max;
    }
    return result;
}