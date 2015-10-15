(function () {
	"use strict";

// this file is for practicing the material learned on any given day. it is to serve as a tabula rasa.

// project calculator: create a calculator that does addition, subtraction, multiplication, division, square roots, exponents, decimals.


// this is where the variables go. These variables are set to get info from the html info.  
var left = document.getElementById("left");
var middle = document.getElementById("middle");
var right = document.getElementById("right");
var buttons = document.getElementsByClassName("numbers");
var operator = document.getElementsByClassName("operator");
var hex = document.getElementById("hex");
var binary = document.getElementById("bin");
var decimal = document.getElementById("dec");
var clear = document.getElementById("clear");
var answer = document.getElementById("equal")


// this is where the event listeners go:
// this listener if for getting the numbers

for(i =0; i < buttons.length, i += 1)) {
	buttons[i].addEventListener("click", numbers, false);
}
// this listener is for getting which operator to perform
for(i = 0; i , i +=1){
 	operator[i].addEventListener("click", operators, false);
 }
 // these listeners are to convert numbers from hex to bin and decimals
hex.addEventListener("click",hexes, false);
binary.addEventListener("click", binaries, false);
decimal.addEventListener("click", decimals, false);

// this event listener is for clearing the displays
clear.addEventListener("click", clears, false);

// this listener is to get the answer
answer.addEventListener("click", answers, false);

// this is where the functions go

//this function gets the numbers for either side of the display depending on if an operator exists
function numbers() {
	if (middle == 0) {
		left.value += this.getAttribute("data-value");
	} else if (middle !== 0 {
		right.value += this.getAttribute("data-value");
	}
}

// this function gets the operator to perform the arithmetic
function operators () {
	middle.value = this.getAttribute("data-value");
}
// this function clears the displays
function clears () {
	left.value = "";
	midlle.value = "";
	right.value = "";
}
// this function

// this is where the outputs go


})();