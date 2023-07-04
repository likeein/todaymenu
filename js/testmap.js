let map;

const searchParams = new URLSearchParams(location.search);

if(searchParams == '') {

  function success({ coords, timestamp }) {
    const latitude  = coords.latitude;
    const longitude = coords.longitude;

    // location.href = `./testmap.php?lat=${latitude}&lng=${longitude}`;
  }

  function getUserLocation() {
      navigator.geolocation.getCurrentPosition(success);
  }

  getUserLocation();
}

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 0, lng: 0 },
    zoom: 8,
  });
}

window.initMap = initMap;
