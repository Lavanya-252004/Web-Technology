const display = document.getElementById("display");

function append(value){

    display.value += value;

}

function clearDisplay(){

    display.value = "";

}

function deleteLast(){

    display.value = display.value.slice(0,-1);

}

function scientific(func){

    display.value += func;

}

function calculate(){

    try{

        let expression = display.value;

        expression = expression.replace(/sqrt\(/g,"Math.sqrt(");
        expression = expression.replace(/sin\(/g,"Math.sin(");
        expression = expression.replace(/cos\(/g,"Math.cos(");
        expression = expression.replace(/tan\(/g,"Math.tan(");
        expression = expression.replace(/log\(/g,"Math.log10(");
        expression = expression.replace(/ln\(/g,"Math.log(");

        display.value = eval(expression);

    }

    catch{

        display.value = "Error";

    }

}

document.addEventListener("keydown",function(e){

    if((e.key>='0' && e.key<='9') || "+-*/().%".includes(e.key)){

        append(e.key);

    }

    else if(e.key==="Enter"){

        calculate();

    }

    else if(e.key==="Backspace"){

        deleteLast();

    }

    else if(e.key==="Escape"){

        clearDisplay();

    }

});