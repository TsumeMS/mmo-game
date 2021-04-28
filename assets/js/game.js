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
	wood: {
		level: 1,
		quantity: 0
	},
	stone: {
		level: 1,
		quantity: 0
	},
	aqua: {
		level: 1,
		quantity: 0
	},
	food: {
		level: 1,
		quantity: 0
	}
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
			var prod = parseInt(document.querySelector('#' + building).querySelector('p').querySelector('span').textContent);
			production[building].production = prod ? prod : production[building].production;
			var lev = parseInt(document.querySelector('#' + building).querySelector('span').querySelector('strong').textContent);
	    	production[building].level = lev ? lev : production[building].level;
		}
	}
}

function upgradeBuilding(event) {
	var building = event.target.parentElement.id;
	production[building].level += 1;
	production[building].production = Math.floor(production[building].production * 1.2);

	document.querySelector('#' + building).querySelector('.building_level').value = production[building].level;
	document.querySelector('#' + building).querySelector('.building_production').value = production[building].production;
}

productionInit();
resourcesInit();

setInterval(refreshResources, 1000);
