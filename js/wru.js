$.fn.wru = function(color) {
    color = color || '#d6393d';
    console.log( this );
    return this.css('outline', '2px solid ' + color);
};