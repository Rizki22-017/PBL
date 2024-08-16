#include <WiFi.h>
#include <HTTPClient.h>

const char* ssid = "POCO";
const char* password = "poco1234";
const char* serverName = "http://192.168.139.125/sensor/post-data.php";

String temperature, distance, soilMoisture;

void setup() {
  Serial.begin(9600);

  // Setup WiFi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void loop() {
  if (Serial.available()) {
    String data = Serial.readStringUntil('\n');
    int tempIndex = data.indexOf("Temperature:");
    int distIndex = data.indexOf("Distance:");
    int soilIndex = data.indexOf("SoilMoisture:");

    if (tempIndex >= 0 && distIndex > tempIndex && soilIndex > distIndex) {
      temperature = data.substring(tempIndex + 12, data.indexOf(';', tempIndex));
      distance = data.substring(distIndex + 9, data.indexOf(';', distIndex));
      
      // Membersihkan karakter tambahan ':' dari soil moisture
      soilMoisture = data.substring(soilIndex + 13, data.indexOf(';', soilIndex));
      
      Serial.print("Temperature: ");
      Serial.println(temperature);
      Serial.print("Distance: ");
      Serial.println(distance);
      Serial.print("SoilMoisture: ");
      Serial.println(soilMoisture);

      // Mengirim data ke server
      if (WiFi.status() == WL_CONNECTED) {
        HTTPClient http;
        http.begin(serverName);
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        String httpRequestData = "temperature=" + temperature + "&distance=" + distance + "&soilMoisture=" + soilMoisture;
        Serial.print("Sending data: ");
        Serial.println(httpRequestData); // Log data yang dikirim
        int httpResponseCode = http.POST(httpRequestData);

        if (httpResponseCode > 0) {
          String response = http.getString();
          Serial.println(httpResponseCode);
          Serial.println(response);
        } else {
          Serial.print("Error on sending POST: ");
          Serial.println(httpResponseCode);
        }
        http.end();
      } else {
        Serial.println("Error in WiFi connection");
      }
    }
  }
}
