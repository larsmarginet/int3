require('./style.css');

const regeneratorRuntime = require("regenerator-runtime");

require('./js/webshop.js');
require('./js/longread.js');
require('./js/validate.js');
{
  const init = () => {
    console.log('hello world!');
  };

  init();
}
