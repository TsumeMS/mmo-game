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

		console.log(document.querySelector('#' + building).querySelector('p'));

		production[building].production = document.querySelector('#' + building)
							   .querySelector('p').querySelector('span').textContent;

	    production[building].level = document.querySelector('#' + building)
							   .querySelector('span').querySelector('strong').textContent;

	    document.querySelector('#' + building).querySelector('button')
	    						.addEventListener('click', (event) => upgradeBuilding(event));
	}
}

function upgradeBuilding(event) {
	console.log(event);
}

productionInit();