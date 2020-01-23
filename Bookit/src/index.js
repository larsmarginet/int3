require('./style.css');

const regeneratorRuntime = require("regenerator-runtime");


if(window.location.href.includes('longread')){
  require('./js/longread.js');
} else {
  require('./js/webshop.js');
}
require('./js/validate.js');
{
  const init = () => {
    console.log('hello world!');
  };

  init();
}
