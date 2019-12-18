// "id": 2794056,
// "name": "Kortrijk",
// "country": "BE",
// "coord": {
//   "lon": 3.26459,
//   "lat": 50.82811

const { Board, GPS } = require("johnny-five");
let gpsData = {}

const getGpsData = () => {
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
    gpsData = {
      lat: gps.latitude,
      long: gps.longitude
    }
  });
};

const getWeather = (lon, lat) => {
  var key = '6754a08c79ebc94732217c11986c0de8';
  fetch(`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${key}`)  
  .then(function(resp) { return resp.json() }) // Convert data to json
  .then(function(data) {
    console.log(data);
    console.log(data.list[0]);
    document.querySelector('.temp').textContent = `${data.list[2].dt_txt}: ${Math.floor(data.list[2].main.temp - 273.15)}°C`;
  })
  .catch(function() {
    // catch any errors
  });
}

const init = () => {
  getGpsData();
  console.log(gpsData);
  getWeather(3.26, 50.83);
}

init();