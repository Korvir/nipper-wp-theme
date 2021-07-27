try {
    window.jQuery = window.$ = require('jquery');
    require("bootstrap");
    require("./modules/main");
    require("./modules/modal");
	require("./modules/scrollTop");
	require("./modules/ajax");
}
catch (e) {
	console.log('JS error !')
}







