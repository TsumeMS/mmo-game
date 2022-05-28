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
		if(!canAddResources(resource, add)) {
			resources[resource].quantity = resources[resource].level * 50;
		} else {
			resources[resource].quantity += add;
		}
		if (document.querySelector('#' + resource)) {
			document.querySelector('#' + resource).querySelector('.quantity')
				.querySelector('strong').textContent = Math.floor(resources[resource].quantity);
		}
	}
	saveToFile('resources', resources);
}

// function productionInit() {
// 	for(let building in production) {
// 		if(document.querySelector('#' + building)) {
// 			let prod = parseInt(document.querySelector('#' + building).querySelector('p').querySelector('span').textContent);
// 			production[building].production = prod ? prod : production[building].production;
// 			let lev = parseInt(document.querySelector('#' + building).querySelector('span').querySelector('strong').textContent);
// 	    	production[building].level = lev ? lev : production[building].level;
// 		}
// 	}
//
// 	readFromFile('buildings', (data) => {
// 		production = data;
// 	});
// }

function upgradeBuilding(event, type) {
	event.preventDefault();
	let building = event.target.parentElement;
	if (!building.id) {
		building = building.parentElement;
	}
	if(type === 'production') {
		production[building.id].level = parseInt(production[building.id].level) + 1;
		production[building.id].production = Math.floor(production[building.id].production * 1.2);

		document.querySelector('#' + building.id).querySelector('.building_level').value = production[building.id].level;
		document.querySelector('#' + building.id).querySelector('.building_production').value = production[building.id].production;
	} else if(type === 'resources') {
		resources[building.id].level += 1;
		document.querySelector('#' + building.id).querySelector('.level').value = 'Poziom ' + resources[building.id].level;
	}
	// ToDo not work fetch -> fixed by preventDefault()
	saveToFile('resources', resources)
		.then(() => document.querySelector(`#${type}Buildings`).submit())
		.catch(error => console.log(error));
}

function readFromFile(fileName, done) {
	const path = host + '/tmp/users/' + login + '/' + fileName + '.json';
	fetch(path).then(resp => resp.json())
		.then(data => done(data));
}

function canAddResources(resource, add) {
	return resources[resource].quantity + add < resources[resource].level * 50;
}

const saveToFile = async function (fileName, data) {
	const path = host + '?f=saveToFile';
	const formData = new FormData();
	formData.append('fileName', fileName);
	formData.append('data', JSON.stringify(data));
	await fetch(path, {
		method: 'POST',
		body: formData
	}).catch(err => console.log(err));
}

productionInit();
resourcesInit();

setInterval(refreshResources, 1000);
