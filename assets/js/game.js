var production = {
	timberHouse: {
		level: 1,
		production: 10
	},
	query: {
		level: 1,
		production: 6
	},
	well: {
		level: 1,
		production: 2
	},
	farm: {
		level: 1,
		production: 1
	},
}

var resources = {
	wood: 0,
	stone: 0,
	aqua: 0,
	food: 0
}

function resourcesInit() {
	for(var resource in resources) {
		if (document.querySelector('#' + resource)) {
			resources[resource] = parseInt(document.querySelector('#' + resource).querySelector('.level')
								.querySelector('strong').textContent);
		}
	}
}

function refreshResources() {
	// produkcja na minutę
	for(var resource in resources) {
		if (document.querySelector('#' + resource)) {
			var add;
			switch(resource) {
				case 'wood':
					add = Math.floor(production['timberHouse'].production / 60);
					break;
				case 'stone':
					add = Math.floor(production['query'].production / 60);
					break;
				case 'aqua':
					add = Math.floor(production['well'].production / 60);
					break;
				case 'food':
					add = Math.floor(production['farm'].production / 60);
					break;
			}
			resources[resource] += add;
			document.querySelector('#' + resource).querySelector('.level')
				.querySelector('strong').textContent = Math.floor(resources[resource]);
		}
	}
}

function productionInit() {
	for(var building in production) {
		if(document.querySelector('#' + building)) {
			production[building].production = parseInt(document.querySelector('#' + building)
							   .querySelector('p').querySelector('span').textContent) ?? production[building].production;

	    	production[building].level = parseInt(document.querySelector('#' + building)
							   .querySelector('span').querySelector('strong').textContent) ?? production[building].level;

	    	document.querySelector('#' + building).querySelector('button')
	    						.addEventListener('click', (event) => upgradeBuilding(event));
		}
	}
}

function upgradeBuilding(event) {
	console.log(JSON.stringify(event));
	var building = event.target.parentElement.id;
	production[building].level++;
	production[building].production = Math.floor(production[building].production * 1.2);

	document.querySelector('#' + building).querySelector('.building_level').value = production[building].level++;
	document.querySelector('#' + building).querySelector('.building_production').value = production[building].production;
}

productionInit();
resourcesInit();

setInterval(refreshResources, 1000);
