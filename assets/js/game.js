var production = {
	timberHouse: {
		level: 1,
		production: 120
	},
	query: {
		level: 1,
		production: 240
	},
	well: {
		level: 1,
		production: 600
	},
	farm: {
		level: 1,
		production: 60
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
					add = production['timberHouse'].production / 60;
					break;
				case 'stone':
					add = production['query'].production / 60;
					break;
				case 'aqua':
					add = production['well'].production / 60;
					break;
				case 'food':
					add = production['farm'].production / 60;
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
							   .querySelector('p').querySelector('span').textContent);

	    	production[building].level = parseInt(document.querySelector('#' + building)
							   .querySelector('span').querySelector('strong').textContent);

	    	document.querySelector('#' + building).querySelector('button')
	    						.addEventListener('click', (event) => upgradeBuilding(event));
		}
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

	var data = new FormData();
	data.append('data', JSON.stringify({
			fileName: 'buildings',
			data: production
		})
	);
	fetch('http://kurs.test/mmo-game/?f=saveToFile', {
		method: 'POST',
		body: data
	});
}	
	
productionInit();
resourcesInit();

setInterval(refreshResources, 1000);