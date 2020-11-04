var production = {
	timberHouse: {
		level: 1,
		production: 10
	},
	sawmill: {
		level: 1,
		production: 10
	},
	query: {
		level: 1,
		production: 10
	},
	well: {
		level: 1,
		production: 10
	},
	farm: {
		level: 1,
		production: 10
	},
}

function productionInit() {
	for(var building in production) {
		production[building].production = document.querySelector('#' + building)
							   .querySelector('p').querySelector('span').textContent;

	    production[building].level = document.querySelector('#' + building)
							   .querySelector('span').querySelector('strong').textContent;
	}

	for(var b in production) {
		alert(b + ' : ' production[b].production + ' ' + b + ':' production[b].level);
	}
}

productionInit();