const defaultLocation = [32.621, 51.669]; // Corrected coordinates
const defaultZoom = 15;

var map = L.map('map').setView(defaultLocation, defaultZoom);

var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: 'Mohamad - <a href="http://www.openstreetmap.org/copyright">7map project</a>'
}).addTo(map);

// Ensure that the map container is sized properly
document.getElementById('map').style.setProperty('height', window.innerHeight + 'px');

// Set view on map
// map.setView([32.611, 51.620], defaultZoom);

// show and pin marker
// L.marker(defaultLocation).addTo(map).bindPopup('Koskesh khooneh').openPopup();
// L.marker([32.631, 51.679]).addTo(map).bindPopup('Koskesh khooneh2');
// map.on('popupopen',function(){
//     alert('popup Opened!');
// });

// get view Bound information
// var northLine = map.getBounds().getNorth();
// var westLine = map.getBounds().getWest();
// var southLine = map.getBounds().getSouth();
// var eastLine = map.getBounds().getEast();


// use map Events
// 1 : get bounds line
// 2 : send bound lines to server
// 3 : search locations in map window
// 4 : display location markers in map

map.on('dblclick',function(event){
    // alert(event.latlng.lat + " , " + event.latlng.lng);
    // 1: add marker after double click
    L.marker(event.latlng).addTo(map);
    // 2: open modal (form) for saving the location
    $('.modal-overlay').fadeIn(500);
    $('#lat-display').val(event.latlng . lat);
    $('#lng-display').val(event.latlng . lng);
    $('#l-type').val(0);
    $('#l-title').val('');
    // done 3: fill the form and submit the location data to the server
    // done 4: save the location in the database with (status: pending review)
    // 5: review locations and verify
}); 



// setTimeout(function(){
// }, 3000);

// find current location (at first use shekan.ir)
var current_position, current_accuracy;

map.on('locationfound', function(e) {
    if (current_position) {
        map.removeLayer(current_position);
        map.removeLayer(current_accuracy);
    }
    var radius = e.accuracy / 2;
    current_position = L.marker(e.latlng).addTo(map)
        .bindPopup("دقت تقریبی: " + e.accuracy + " متر").openPopup();
    current_accuracy = L.circle(e.latlng, radius).addTo(map);    
});

map.on('locationerror', function(e) {
    console.log("Geolocation error: " + e.message); // Better error handling
});

// Wrap map.locate in a function
function locate() {
    map.locate({setView: true, maxZoom: defaultZoom, timeout: 10000}); // Extend timeout period if needed
}

// Call locate every 5 seconds ... forever
// setInterval(locate, 2000);



// closing the form with clicking on the X
$(document).ready(function(){
    $('form#addLocationForm').submit(function(e){
        e.preventDefault(); // prevent form from submitting

        var form = $(this); 
        var resultTag = form.find('.ajax-result');
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            },
            success: function(response){
                resultTag.html(response);
            },
            error: function(xhr, status, error) {
                resultTag.html('Error: ' + error);
            }
        });
    });

    $('.modal-overlay .close').click(function(){
        $('.modal-overlay').fadeOut();
    });
});