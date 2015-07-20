var app = angular.module('lesotoApp', []);

app.controller('progressCtrl', function($scope) {
    $scope.progress = 30;
});

var map;
function initialize() {
  map = new google.maps.Map(document.getElementById('map-canvas'), {
    zoom: 8,
    center: {lat: -29.4667, lng: 28.233}
  });
}

google.maps.event.addDomListener(window, 'load', initialize);