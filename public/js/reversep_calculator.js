"use strict";

function listener(event) {
	console.log(this);
}

var buttons = document.getElementsByClassName("number");
var left = document.getElementById("left");
var middle = document.getElementById("middle");
var right = document.getElementById("right");
var operator = document.getElementsByClassName("operand");
var equal = document.getElementById("equals");
var clear = document.getElementById("clear");

 for ( var i = 0; i < buttons.length; i+=1) {
 	buttons[i].addEventListener("click", numbers, false);
 }

function numbers() {
	if (middle.value == 0){
		left.value += this.getAttribute("data-value");
	} else if (middle != 0){
		right.value += this.getAttribute("data-value");
	}
}

function operands() {
	middle.value = this.getAttribute("data-value");
}

	for( var i = 0; i < operator.length; i += 1) {
		operator[i].addEventListener("click", operands, false);
	}

 function clean() {
 	left.value = "";
 	middle.value = "";
 	right.value = "";
 }
 
 clear.addEventListener("click", clean, false);


 function answers() {
 	var answer = 0;
 	if (middle.value == "+") {
	 	answer = parseFloat(left.value) + parseFloat(right.value);
 	} else if (middle.value =="-") {
	 	answer = parseFloat(left.value) - parseFloat(right.value);
	} else if (middle.value == "*") {
	 	answer = parseFloat(left.value) * parseFloat(right.value);
    } else if (middle.value == "/") {
	 	answer = parseFloat(left.value)/parseFloat(right.value);
    }
    clean();
    
    left.value = answer;
     
}
equal.addEventListener("click", answers, false);

