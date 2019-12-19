// "id": 2794056,
// "name": "Kortrijk",
// "country": "BE",
// "coord": {
//   "lon": 3.26459,
//   "lat": 50.82811



const { Board, GPS } = require("johnny-five");

const init = () => {
  getArduinoData();
  getLocation();
}




//Check if GPS board works. If not continue with hardcoded coordinates (set on Kortrijk)
const checkGpsData = gpsData => {
  if (gpsData.lat === 0 || gpsData.lon === 0) {
    console.log('gps failed');
    getWeather(3.26, 50.83);
  } else {
    console.log('gps location found!');
    getWeather(gpsData.lon, gpsData.lat);
  }
}

const getArduinoData = () => {
  const board = new Board({
    repl: false
  });
  
  board.on("ready", () => {
    const gps = new GPS({
      pins: {
        rx: 11,
        tx: 10,
      }
    });
  
    // If latitude, longitude data log it.
    // This will output zero until a valid
    // GPS position is detected.
    gps.on("data", position => {
      const {altitude, latitude, longitude} = position;
      console.log("GPS Position:");
      console.log("  altitude   : ", altitude);
      console.log("  latitude   : ", latitude);
      console.log("  longitude  : ", longitude);
      console.log("--------------------------------------");
    });
    const gpsData = {
      lat: gps.latitude,
      long: gps.longitude
    }
    checkGpsData(gpsData);
  });
};





// Fetch JSON file with weather
const getWeather = (lon, lat) => {
  var key = '6754a08c79ebc94732217c11986c0de8';
  fetch(`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${key}`)  
  .then(function(resp) { return resp.json() }) // Convert data to json
  .then(function(data) {
    convertWeatherData(data);
  })
  .catch(function() {
    // catch any errors
  });
}



let weatherData = [];



// Convert JSON to data I need 
const convertWeatherData = data => {
  console.log(data);
  for (let i = 0; i < 8; i++) {
    const item = data.list[i];
    const weatherObj = {
      time: convertTime(new Date(item.dt_txt)), 
      temp: Math.round(item.main.temp - 273.15),
      type: item.weather[0].main
    }
    weatherData.push(weatherObj);
  }
  console.log(weatherData);
  document.querySelector('.temp').textContent = `${weatherData[0].time}:00 --- ${weatherData[0].temp}°C`;
}


//convert Time 
const convertTime = time => {
  const hours = ("0" + time.getHours()).slice(-2);
  return hours;
}




























//Get location through browser (doesn't work in Electron!?)
const getLocation = () => {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, error);
  } else { 
    console.log("Geolocation is not supported by this browser.");
  }
}

const error = () => {
  console.log("Unable to retrieve your location");
}

const showPosition = (position) => {
  console.log(`latitude: ${position.coords.latitude} ---- longitude: ${position.coords.longitude}`);
}



init();