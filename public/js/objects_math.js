"use strict";
(function() {
var circle = {
	radius : 3,
	getArea: function() {
		var area = Math.PI * Math.pow(this.radius,2);
		return area;
	},
	logInfo: function(round) {
		var result = this.getArea();

		if (round) {
			console.log("Area of circle with radius " + this.radius + " is" + Math.round(result));
		} else {
			console.log("Area of circle with radius " + this.radius + " is" + result);
		}
		
	}
};

circle.logInfo(false);
circle.logInfo(true);

circle.radius = 5

circle.logInfo(false);
circle.logInfo(true);
})();