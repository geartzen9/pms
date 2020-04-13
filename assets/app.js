// Load te Sass.
require('./scss/main.scss');

// Load jQuery and Bootstrap
global.$ = require('jquery');
require('bootstrap');

// Load drawer code if drawer exists.
if ($('#drawer').length) {
    require('./js/drawer.js');
}