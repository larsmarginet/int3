// "id": 2794056,
// "name": "Kortrijk",
// "country": "BE",
// "coord": {
//   "lon": 3.26459,
//   "lat": 50.82811

import "./style.css";

const { Board, GPS, Sensor, Thermometer } = require("johnny-five");

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
let temperature;

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

    const thermometer = new Thermometer({
      pin: "A0"
    });
  
    thermometer.on("change", () => {
      const {celsius, fahrenheit, kelvin} = thermometer;
      temperature = celsius;
      document.querySelector('.tempInside').textContent = `Inside: ${temperature}°C`
    });

    const potentiometer = new Sensor("A3");

    potentiometer.on("change", () => {
      const {value, raw} = potentiometer;
      //console.log(potentiometer.value)
      timeByPot = showValue(potentiometer);
      document.querySelector(".time").textContent = timeByPot;
      showCurrentWeather(weatherData, timeByPot, temperature);
    });
  });
};

//Show weather based on hour
const showCurrentWeather = (weatherData, timeByPot, temperature) => {
  const currTime = new Date(Date.now());
  const currMinutes = currTime.getMinutes();
  const currHours = currTime.getHours();
  const hour = timeByPot.substring(0, 2);
  const minute = timeByPot.substring(3, 5);
  const $temp = document.querySelector('.temp');
  //Api gives data of every 3 hours (00 - 03 - 06 - 09 - 12 - ...). So if the current hour is lower than the first hour delivered by the API you need te make sure it can display the weather for the first following hour
  //This if statement makes sure it shows the data for the comming hour and not the data of the hour on the next day
  //if (curerentHour + 1) === firstHourApi AND the minute >= currentMinute
  //((parseFloat(hour) + 1)).toString() === weatherData[0].time[0] && minute >= currMinutes
  console.log(currMinutes);
  if(("0" + (currHours + 2)).slice(-2) === weatherData[0].time[0]) {
    if(((parseFloat(hour) + 2)).toString() === weatherData[0].time[0] && minute < currMinutes){
      $temp.textContent = `${weatherData[weatherData.length - 1].temp}°C --- ${weatherData[weatherData.length - 1].type}`;
    } else if (((parseFloat(hour) + 2)).toString() === weatherData[0].time[0]) {
      $temp.textContent = `${weatherData[0].temp}°C --- ${weatherData[0].type}`;
    } else if (((parseFloat(hour) + 1)).toString() === weatherData[0].time[0]) {
      $temp.textContent = `${weatherData[0].temp}°C --- ${weatherData[0].type}`;
    } else {
      weatherData.forEach(data => {
        if (data.time.includes(hour)) {
          $temp.textContent = `${data.temp}°C --- ${data.type}`;
        }
      });
    }
  } else if (("0" + (currHours + 1)).slice(-2) === weatherData[0].time[0]) {
    if(((parseFloat(hour) + 1)).toString() === weatherData[0].time[0] && minute >= currMinutes){
      $temp.textContent = `${weatherData[0].temp}°C --- ${weatherData[0].type}`;
    } else {
      weatherData.forEach(data => {
        if (data.time.includes(hour)) {
             $temp.textContent = `${data.temp}°C --- ${data.type}`;
           }
        });
    } 
  } else if (("0" + (currHours)).slice(-2) === weatherData[0].time[0]) {
    if(((parseFloat(hour))).toString() === weatherData[0].time[0] && minute < currMinutes) {
      $temp.textContent = `${weatherData[weatherData.length - 1].temp}°C --- ${weatherData[weatherData.length - 1].type}`;
    } else {
      weatherData.forEach(data => {
        if (data.time.includes(hour)) {
             $temp.textContent = `${data.temp}°C --- ${data.type}`;
           }
        });
    }
    
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
}


//convert Time --> make array with the hour range (3 hours)
const convertTime = time => {
  const hour1 = time.getHours();
  const hour2 = time.getHours() + 1;
  const hour3 = time.getHours() + 2;
  const hoursRange = [("0" + hour1).slice(-2), ("0" + hour2).slice(-2), ("0" + hour3).slice(-2)];
  return hoursRange;
}

//Convert minutes to hours and minutes
const convertInputToTime = input => {
  const convert = input / 60;
  const hour = convert.toString().split(".")[0];
  const convertedHours = ("0" + hour).slice(-2);
  const minutes = Math.floor(parseFloat(("0." + convert.toString().split(".")[1])) * 60);
  const convertedMinutes = ("0" + minutes).slice(-2);
  return `${convertedHours}:${convertedMinutes}`;
}

//Get current time and return it in total minutes
const getCurrentTime = () => {
  const currentTime = new Date(Date.now()); //test minus 1 hour: - 3600000
  const hours = currentTime.getHours() * 60;
  const minutes = currentTime.getMinutes();
  return hours + minutes;
}

//Convert potentiometer value to time (if time reaches 23:59 jump to 00:00
const showValue = potentiometer => {
  const currentTime = getCurrentTime();
  //Max range of potentiometer is 1023, so multiply by 1.407... to reach 1440 (which is the total amount of minutes in a day)
  const input = potentiometer.value * 1.40762463;
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