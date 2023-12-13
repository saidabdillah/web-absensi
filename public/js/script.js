const successCallback = (position) => {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const inputLatitude = document.querySelector("#latitude");
    const inputLongitude = document.querySelector("#longitude");

    if (inputLatitude) {
        inputLatitude.value = latitude;
        inputLongitude.value = longitude;
    }
};
const errorCallback = (error) => {
    return error;
};

navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
