function getWeather() {

    let city = document.getElementById("city").value.trim();

    if (city === "") {
        document.getElementById("weatherData").innerHTML =
            "<p>Please enter a city name.</p>";
        return;
    }

    // Create AJAX request
    let xhr = new XMLHttpRequest();

    // Fetch hypothetical API data from JSON file
    xhr.open("GET", "weather.json", true);

    xhr.onload = function() {

        if (xhr.status === 200) {

            // Convert JSON response into JavaScript object
            let data = JSON.parse(xhr.responseText);

            // Find the entered city
            let weather = data.cities.find(function(item) {
                return item.city.toLowerCase() === city.toLowerCase();
            });

            if (weather) {

                document.getElementById("weatherData").innerHTML =
                    "<h2>" + weather.city + "</h2>" +
                    "<p><b>Temperature:</b> " +
                    weather.temperature + " °C</p>" +
                    "<p><b>Humidity:</b> " +
                    weather.humidity + "%</p>";

            } else {

                document.getElementById("weatherData").innerHTML =
                    "<p>City not found .</p>" +
                    "<p>Try Chennai, Mumbai, Delhi, Bangalore, " +
                    "Hyderabad, Kolkata, Pune, Coimbatore, " +
                    "Madurai or Puducherry.</p>";
            }

        } else {
            document.getElementById("weatherData").innerHTML =
                "<p>Unable to fetch weather data.</p>";
        }
    };

    xhr.onerror = function() {
        document.getElementById("weatherData").innerHTML =
            "<p>Unable to load JSON file. Use Live Server.</p>";
    };

    xhr.send();
}