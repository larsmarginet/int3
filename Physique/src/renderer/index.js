// "id": 2794056,
// "name": "Kortrijk",
// "country": "BE",
// "coord": {
//   "lon": 3.26459,
//   "lat": 50.82811


//GENT: 51.07 3.67
//WENDUINE 51.297 3.086
//BARCELONA 41.3872 2.1733

import "./style.css";
import atmosphere from './img/atmosphere.gif';
import clear from './img/clear.gif';
import clouds from './img/clouds.gif';
import drizzle from './img/drizzle.gif';
import rain from './img/rain.gif';
import snow from './img/snow.gif';
import thunderstorm from './img/thunderstorm.gif';
import pluszero from './img/pluszero.png';
import plusone from './img/plusone.png';
import plustwo from './img/plustwo.png';




const { Board, GPS, Sensor, Thermometer } = require("johnny-five");

const init = () => {
  getArduinoData();
  getLocation();
}

//Check if GPS board works. If not continue with hardcoded coordinates (set on Kortrijk)
const checkGpsData = gpsData => {
  if (gpsData.lat === 0 || gpsData.lon === 0) {
    console.log('gps failed');
    getWeather(3.26459, 50.82811);
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
      //console.log(`${temperature}°C`);
    });

    const potentiometer = new Sensor("A3");

    potentiometer.on("change", () => {
      const {value, raw} = potentiometer;
      //console.log(potentiometer.value)
      timeByPot = showValue(potentiometer);
      document.querySelectorAll(".time").forEach(time => {
        time.textContent = timeByPot;
      });
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
  const minute = parseFloat(timeByPot.substring(3, 5));
  const $temps = document.querySelectorAll('.temp');

  $temps.forEach($temp => {
    if(("0" + (currHours + 2)).slice(-2) === weatherData[0].time[0]) {
      if(("0" + ((parseFloat(hour) + 2)).toString()).slice(-2) === weatherData[0].time[0] && minute < currMinutes){
        $temp.textContent = `${weatherData[weatherData.length - 1].temp}°C`;
        showWeatherType(weatherData[weatherData.length - 1].type);
        calculateClothingAdvice(temperature, weatherData[weatherData.length - 1].temp);
      } else if (("0" + ((parseFloat(hour) + 2)).toString()).slice(-2) === weatherData[0].time[0]) {
        $temp.textContent = `${weatherData[0].temp}°C`;
        showWeatherType(weatherData[0].type);
        calculateClothingAdvice(temperature, weatherData[0].temp);
      } else if (("0" + ((parseFloat(hour) + 1)).toString()).slice(-2) === weatherData[0].time[0]) {
        $temp.textContent = `${weatherData[0].temp}°C`;
        showWeatherType(weatherData[0].type);
        calculateClothingAdvice(temperature, weatherData[0].temp);
      } else {
        weatherData.forEach(data => {
          if (data.time.includes(hour)) {
            $temp.textContent = `${data.temp}°C`;
            showWeatherType(data.type);
            calculateClothingAdvice(temperature, data.temp);
          }
        });
      }
    } else if (("0" + (currHours + 1)).slice(-2) === weatherData[0].time[0]) {
      if(("0" + ((parseFloat(hour) + 1)).toString()).slice(-2) === weatherData[0].time[0] && minute >= currMinutes){
        $temp.textContent = `${weatherData[0].temp}°C`;
        showWeatherType(weatherData[0].type);
        calculateClothingAdvice(temperature, weatherData[0].temp);
      } else {
        weatherData.forEach(data => {
          if (data.time.includes(hour)) {
              $temp.textContent = `${data.temp}°C`;
              showWeatherType(data.type);
              calculateClothingAdvice(temperature, data.temp);         
             }
          });
      } 
    } else if (("0" + (currHours)).slice(-2) === weatherData[0].time[0]) {
      if(("0" + (hour)).slice(-2) === weatherData[0].time[0] && minute < currMinutes) {
        $temp.textContent = `${weatherData[weatherData.length - 1].temp}°C`;
        showWeatherType(weatherData[weatherData.length - 1].type);
        calculateClothingAdvice(temperature, weatherData[weatherData.length - 1].temp);
      } else {
        weatherData.forEach(data => {
          if (data.time.includes(hour)) {
            $temp.textContent = `${data.temp}°C`;
            showWeatherType(data.type);
            calculateClothingAdvice(temperature, data.temp);
          }
        });
      }
    }
  });
};


//Calculate clothing advice based on the temperature difference
const calculateClothingAdvice = (temperature, weatherTemp) => {
  const $advices = document.querySelectorAll('.advice');
  $advices.forEach($advice => {
    if ((temperature - weatherTemp) <= 0) {
      $advice.innerHTML = `<img class="icon" src="${pluszero}">`;
    } else if ((temperature - weatherTemp) <= 5) {
      $advice.innerHTML = `<img class="icon" src="${plusone}">`;
    } else if ((temperature - weatherTemp) > 5) {
      $advice.innerHTML = `<img class="icon" src="${plustwo}">`;
    }
  });
}


const showWeatherType = type => {
  const $types = document.querySelectorAll('.type'); 
  $types.forEach($type => {
    switch (type) {
      case "Thunderstorm":
        console.log("thunderstorm");
        $type.innerHTML = `<img class="animation" src='${thunderstorm}'>`;
        break;
      case "Drizzle":
        console.log("Drizzle");
        $type.innerHTML = `<img class="animation" src='${drizzle}'>`;
        break;
      case "Rain":
        console.log("Rain");
        $type.innerHTML = `<img class="animation" src='${rain}'>`;
        break;
      case "Snow":
        console.log("Snow");
        $type.innerHTML = `<img class="animation" src='${snow}'>`;
        break;
      case "Atmosphere":
        console.log("Atmosphere");
        $type.innerHTML = `<img class="animation" src='${atmosphere}'>`;
        break;
      case "Clear":
        console.log("Clear");
        $type.innerHTML = `<img class="animation" src='${clear}'>`;
        break;
      case "Clouds":
        console.log("Clouds");
        $type.innerHTML = `<img class="animation" src='${clouds}'>`;
        break;
      default:
        $type.textContent = "Unknown weathertype...";
    }
  });
}


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