const host = window.location.origin + (window.location.pathname ? window.location.pathname : '');
const login = document.cookie.split(';').filter(cookie => cookie.indexOf('user=') > -1)[0].substring(5);

let production = {
	timberHouse: {
		level: 1,
		production: 0
	},
	query: {
		level: 1,
		production: 0
	},
	well: {
		level: 1,
		production: 0
	},
	farm: {
		level: 1,
		production: 0
	},
}

let resources = {
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
	for(let resource in resources) {
		if (document.querySelector('#' + resource)) {
			resources[resource].level = parseInt(document.querySelector('#' + resource).querySelector('.level')
								.querySelector('span').textContent);
			resources[resource].quantity = parseInt(document.querySelector('#' + resource).querySelector('.quantity')
								.querySelector('strong').textContent);
		}
	}

	readFromFile('resources', (data) => {
		resources = data;
	});
}

function refreshResources() {
	// produkcja na godzinę
	for(let resource in resources) {
		let add = 0;
		switch(resource) {
			case 'wood':
				add = production['timberHouse'].production / 3600;
				break;
			case 'stone':
				add = production['query'].production / 3600;
				break;
			case 'aqua':
				add = production['well'].production / 3600;
				break;
			case 'food':
				add = production['farm'].production / 3600;
				break;
		}
		resources[resource].quantity += add;
		if (document.querySelector('#' + resource)) {
			document.querySelector('#' + resource).querySelector('.level')
				.querySelector('span').textContent = Math.floor(resources[resource]);
		}
	}
	saveToFile('resources', resources);	
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

	readFromFile('buildings', (data) => {
		production = data;
	});
}

function upgradeBuilding(event, type) {
	var building = event.target.parentElement.parentElement.id;
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
	const path = host + '/tmp/users/' + login + '/' + fileName + '.json';
	fetch(path).then(resp => resp.json())
		.then(data => done(data));
}

const saveToFile = async function (fileName, data) {
	const path = host + '?f=saveToFile';
	const formData = new FormData();
	formData.append('fileName', fileName);
	formData.append('data', JSON.stringify(data));
	await fetch(path, {
		method: 'POST',
		body: formData
	});
}

productionInit();
resourcesInit();

setInterval(refreshResources, 1000);
