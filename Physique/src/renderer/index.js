// "id": 2794056,
// "name": "Kortrijk",
// "country": "BE",
// "coord": {
//   "lon": 3.26459,
//   "lat": 50.82811



const { Board, GPS, Sensor } = require("johnny-five");

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

let timeByPot;
let weatherData = [];

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

    const gpsData = {
      lat: gps.latitude,
      long: gps.longitude
    }

    checkGpsData(gpsData);


    const potentiometer = new Sensor("A3");

    potentiometer.on("change", () => {
      const {value, raw} = potentiometer;
      //console.log(potentiometer.value)
      timeByPot = showValue(potentiometer);
      document.querySelector(".time").textContent = timeByPot;
      showCurrentWeather(weatherData, timeByPot);
    });
  });
};


const showCurrentWeather = (weatherData, timeByPot) => {
  const hour = timeByPot.substring(0, 2);
  const $temp = document.querySelector('.temp');
  $temp.textContent = `${weatherData[0].temp}°C`
  if (hour === weatherData[0].time) {
    console.log(weatherData[0].time);
    console.log("match");
  } else {
    console.log("no match");
  }
};


// Fetch JSON file with weather
const getWeather = (lon, lat) => {
  var key = '6754a08c79ebc94732217c11986c0de8';
  fetch(`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${key}`)  
  .then(function(resp) { return resp.json() }) // Convert data to json
  .then(function(data) {
    //convertWeatherData(data);
    convertWeatherData(data);
  })
  .catch(function() {
    // catch any errors
  });
}







// Convert JSON to data I need 
const convertWeatherData = data => {
  //const time = document.querySelector(".time").textContent;
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
  console.log(timeByPot);
  //return weatherData;
}


//convert Time 
const convertTime = time => {
  const hours = ("0" + time.getHours()).slice(-2);
  return hours;
}


const convertInputToTime = input => {
  const convert = input / 60;
  const hour = convert.toString().split(".")[0];
  const convertedHours = ("0" + hour).slice(-2);
  const minutes = (parseFloat(convert.toString().split(".")[1]) * 60).toString().substring(0, 2);
  const convertMinutes = ("0" + minutes).slice(-2);
  return `${convertedHours}:${convertMinutes}`;
}


const getCurrentTime = () => {
  const currentTime = new Date(Date.now());
  const hours = currentTime.getHours() * 60;
  const minutes = currentTime.getMinutes();
  return hours + minutes;
}



const showValue = potentiometer => {
  const currentTime = getCurrentTime(); //Tijd ophalen via code en dan omzetten naar minuten
  const input = potentiometer.value * 1.40762463
  const currentDay = 1440 - currentTime;
  if (input <= currentDay) {
    const fullTime = input + currentTime;
    return convertInputToTime(fullTime);
  } else {
    const resetTime  = input - currentDay;
    return convertInputToTime(resetTime);
  }
  
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