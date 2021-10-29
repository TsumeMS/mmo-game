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
	readFromFile('buildings', function(data) {
		console.log(data);
		for(var resource in resources) {
			if (document.querySelector('#' + resource)) {
				var add = 0;
				switch(resource) {
					case 'wood':
						add = Math.floor(data['timberHouse'].production / 60);
						break;
					case 'stone':
						add = Math.floor(data['query'].production / 60);
						break;
					case 'aqua':
						add = Math.floor(data['well'].production / 60);
						break;
					case 'food':
						add = Math.floor(data['farm'].production / 60);
						break;
				}

				resources[resource].quantity += add;

				document.querySelector('#' + resource).querySelector('.level')
					.querySelector('strong').textContent = Math.floor(resources[resource]);
				return;
			}
		}
	});
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

function upgradeBuilding(event, type) {
	var building = event.target.parentElement.id;
	if(type === 'production') {
		production[building].level += 1;
		production[building].production = Math.floor(production[building].production * 1.2);

		document.querySelector('#' + building).querySelector('.building_level').value = production[building].level;
		document.querySelector('#' + building).querySelector('.building_production').value = production[building].production;
	} else if(type === 'resources') {
		resources[building].level += 1;
		document.querySelector('#' + building).querySelector('.level').value = 'Poziom ' + resources[building].level;
	}
}

function readFromFile(fileName, done) {
	var host = window.location.origin + (window.location.pathname ? window.location.pathname : '');
	var login = document.cookie.split(';').filter(cookie => cookie.indexOf('user=') > -1)[0].substring(5);
	var path = host + '/tmp/users/' + login + '/' + fileName + '.json';
	fetch(path).then(resp => resp.json())
		.then(data => done(data));
}

productionInit();
resourcesInit();

setInterval(refreshResources, 1000);
