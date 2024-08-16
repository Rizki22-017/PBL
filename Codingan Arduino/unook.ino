#include <OneWire.h>
#include <DallasTemperature.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <Stepper.h>

const int stepsPerRevolution = 200;
Stepper myStepper(stepsPerRevolution, 7, 6, 5, 4);

// Pin untuk DS18B20
#define ONE_WIRE_BUS A2
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);

// Pin untuk HC-SR04
#define TRIG_PIN 8
#define ECHO_PIN 9

// Pin untuk Sensor Kelembapan Tanah
#define SOIL_MOISTURE_PIN A3

#define m1 11
#define m2 10
long delaystepper = 0;
unsigned long previousTime = millis();
long timeInterval = 1000;

LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup(void) {
  // Setup sensor suhu DS18B20
  sensors.begin();

  // Setup Serial Monitor
  Serial.begin(9600);

  // Setup LCD
  lcd.begin(16, 2);
  lcd.backlight();

  // Setup pin HC-SR04
  pinMode(TRIG_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT);

  // Setup pin Sensor Kelembapan Tanah
  pinMode(SOIL_MOISTURE_PIN, INPUT);

  pinMode(m1, OUTPUT);
  pinMode(m2, OUTPUT);
  digitalWrite(m1, HIGH);
  digitalWrite(m2, HIGH);
  myStepper.setSpeed(100);
}

void loop(void) {
  unsigned long currentTime = millis();
  if (currentTime - previousTime >= timeInterval) {  //pengambilan data per 1 detik

    //pembacaan suhu dengan DS18B20
    sensors.requestTemperatures();
    float tempC = sensors.getTempCByIndex(0);

    //HC-SR04
    long duration, distance;
    digitalWrite(TRIG_PIN, LOW);
    delayMicroseconds(2);
    digitalWrite(TRIG_PIN, HIGH);
    delayMicroseconds(10);
    digitalWrite(TRIG_PIN, LOW);
    duration = pulseIn(ECHO_PIN, HIGH);
    distance = duration * 0.034 / 2;

    //kelembaban tanah
    int soilMoistureValue = analogRead(SOIL_MOISTURE_PIN);
    float soilMoisturePercent = map(soilMoistureValue, 1023, 0, 0, 100);

    //pengiriman data ke serial monitor
    Serial.print("Temperature:");
    Serial.print(tempC);
    Serial.print(";");
    Serial.print("Distance:");
    Serial.print(distance);
    Serial.print(";");
    Serial.print("SoilMoisture:");
    Serial.print(soilMoisturePercent);
    Serial.println(";");

    //pembaruan tampilan LCD
    lcd.clear();
    lcd.setCursor(0, 0);
    lcd.print("S:");
    lcd.print(tempC);
    lcd.print("C ");
    lcd.print("J:");
    lcd.print(distance);
    lcd.print("cm");
    lcd.setCursor(0, 1);
    lcd.print("K: ");
    lcd.print(soilMoisturePercent);
    lcd.print("%");

    //logika
    if (soilMoisturePercent > 40) {
      for (int i = 0; i < 150; i++) {  //150=15detik
        digitalWrite(m1, LOW);
        myStepper.step(35);
      }
      digitalWrite(m1, HIGH);
    } else if (soilMoisturePercent >= 30 and soilMoisturePercent <= 40) {
      for (int i = 0; i < 150; i++) {
        digitalWrite(m1, LOW);
        myStepper.step(35);
      }
      digitalWrite(m1, HIGH);
      for (int i = 0; i < 150; i++) {
        digitalWrite(m2, LOW);
        myStepper.step(35);
      }
      digitalWrite(m2, HIGH);
    } else if (tempC >= 20 and tempC <= 40) {
      // Kondisi suhu antara 30 dan 40 derajat Celcius
      digitalWrite(m1, HIGH);  // Mematikan m1
      digitalWrite(m2, HIGH);  // Mematikan m2
      // Mematikan motor stepper
      digitalWrite(7, LOW);
      digitalWrite(6, LOW);
      digitalWrite(5, LOW);
      digitalWrite(4, LOW);
    } else if (tempC > 40) {
      // Kondisi suhu diatas 40
      for (int i = 0; i < 150; i++) {
        digitalWrite(m1, LOW);
        myStepper.step(35);
      }
      digitalWrite(m1, HIGH);
      for (int i = 0; i < 150; i++) {
        digitalWrite(m2, LOW);
        myStepper.step(35);
      }
      digitalWrite(m2, HIGH);
    } else {
      digitalWrite(m2, HIGH);
      digitalWrite(m1, HIGH);

      if (delaystepper >= 172800) {      //48h=172800detik
        for (int i = 0; i < 600; i++) {  //600=60detik
          myStepper.step(35);
        }
        delaystepper = 0;
      }
    }

    delaystepper++;

    previousTime = currentTime;
  }
}
