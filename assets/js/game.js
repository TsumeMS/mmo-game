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

		production[building].production = parseInt(document.querySelector('#' + building)
							   .querySelector('p').querySelector('span').textContent);

	    production[building].level = parseInt(document.querySelector('#' + building)
							   .querySelector('span').querySelector('strong').textContent);

	    document.querySelector('#' + building).querySelector('button')
	    						.addEventListener('click', (event) => upgradeBuilding(event));
	}
}

function upgradeBuilding(event) {
	var building = event.target.parentElement.id;
	production[building].level++;
	production[building].production = Math.floor(production[building].production * 1.2);

	for(var building in production) {

		document.querySelector('#' + building).querySelector('p')
				.querySelector('span').textContent = production[building].production;

	    document.querySelector('#' + building).querySelector('span')
	    		.querySelector('strong').textContent = production[building].level;
	}

	fetch('http://kurs.test/?f=saveToFile').then(response => response.json())
		.then(function(result) {
			console.log(result);
		})
}	
	
productionInit();