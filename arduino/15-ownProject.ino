#include &#60;LiquidCrystal.h>

// The pins for communication with the display
LiquidCrystal lcd(12, 11, 5, 4, 3, 2);

// variables for the TMP-reading
const int numReadings = 10;

int readings[numReadings];      // the readings from the analog input
int readIndex = 0;              // the index of the current reading
int total = 0;                  // the running total
int average = 0;                // the average

const int inputPinTmp = A0;     // Pin for the TMP sensor

int photocellPin = A1;          // the cell are connected to A1

const int buttonPin = 7;        // the pin for the buttom

// variables for the Photocell calibration:
int sensorValue = 0;         // the sensor value
int sensorMin = 1023;        // minimum sensor value
int sensorMax = 0;           // maximum sensor value

// variables for the button state
int buttonState = 0;

void setup() {
    // initialize serial communication with computer:
    Serial.begin(9600);

    lcd.begin(16, 2);
    pinMode(7 ,INPUT); //Buton
    pinMode(8 ,OUTPUT); //led
    pinMode(9 ,OUTPUT); //led
    pinMode(10 ,OUTPUT); //led

    // initialize all the readings to 0:
    for (int thisReading = 0; thisReading < numReadings; thisReading++) {
        readings[thisReading] = 0;
    }

    // calibrates the photosensor during the first five seconds
    while (millis() < 5000) {
        sensorValue = analogRead(photocellPin);

        // record the maximum sensor value
        if (sensorValue > sensorMax) {
            sensorMax = sensorValue;
        }
        // record the minimum sensor value
        if (sensorValue < sensorMin) {
            sensorMin = sensorValue;
        }
    }
}

void loop() {

    int sensorValTMP = analogRead(inputPinTmp);

    //covert the ADC reading to voltage
    float voltage = (sensorValTMP/1024.0) * 5.0;

    Serial.print(" Degrees C:");
    // convert the voltage to temp in C
    float temperature = (voltage - .5) * 100;
    Serial.println(temperature);

    // subtract the last reading:
    total = total - readings[readIndex];

    readings[readIndex] = temperature;

    // add the reading to the total:
    total = total + readings[readIndex];

    // advance to the next position in the array:
    readIndex = readIndex + 1;

    // if we're at the end of the array...
    if (readIndex >= numReadings) {
        // ...wrap around to the beginning:
        readIndex = 0;
    }

    // calculate the average:
    average = total / numReadings;

    /*
    * Turns off and on LCD's based on the average temperature.
    * If temp is under 0 turn on 0 led's
    * If temp is between 0 and 11 turn on 1 led
    * If temp is between 9 and 20 turn on 2 led's
    * If temp is over the 20 turn on all led's
    */
    if (average < 0 ) {
        digitalWrite(10, LOW);
        digitalWrite(9, LOW);
        digitalWrite(8, LOW);

    } else if (average >= 0 && average < 10) {
        digitalWrite(10, HIGH);
        digitalWrite(9, LOW);
        digitalWrite(8, LOW);

    } else if(average >= 10 && average < 20) {
        digitalWrite(10, HIGH);
        digitalWrite(9, HIGH);
        digitalWrite(8, LOW);

    } else if(average >= 20 ) {
        digitalWrite(10, HIGH);
        digitalWrite(9, HIGH);
        digitalWrite(8, HIGH);
    }

    lcd.setCursor(0, 1);
    lcd.print("Average temp   C ");
    lcd.setCursor(13, 1);
    lcd.print(average);

    buttonState = digitalRead(7);

    // check if the pushbutton is pressed.
    if (buttonState == HIGH) {
        //Re-calibrates
    } else if(buttonState == LOW) {

    }

    sensorValue = analogRead(photocellPin);

    // apply the calibration to the sensor reading
    sensorValue = map(sensorValue, sensorMin, sensorMax, 0, 255);

    // in case the sensor value is outside the range seen during calibration
    sensorValue = constrain(sensorValue, 0, 255);


    /*
    * This under here is a way to see the RAW LDR-value on the lcd display
    * If you want to see the RAW value:
    * -put the normal code (The one with the sentences) within comments.
    * -un comment the code that's in a comment under here
    *
    */

    /*
    // Make from the LDR-value a string to get the length
    String LDRval = String(sensorValue);
    Serial.print(LDRval);

    //The folling code is to print the raw code onto the LCD
    if (LDRval.length() > 2) {
        lcd.setCursor(0, 0);
        lcd.print(sensorValue);
    } else if(LDRval.length() < 3) {
        lcd.setCursor(0, 0);
        lcd.print("0");
        lcd.setCursor(1, 0);
        lcd.print(sensorValue);
    } else if (LDRval == 0) {
        lcd.setCursor(0, 0);
        lcd.print("000");
    }
    */


    // The following code is for the sentences that are expressing the
    // lightingcoditions with a normal sentence.

    if (sensorValue < 50) {
        lcd.setCursor(0, 0);
        lcd.print("It's Dark"); //9
        lcd.setCursor(9, 0);
        lcd.print("       "); //6
    } else if (sensorValue < 100) {
        lcd.setCursor(0, 0);
        lcd.print("It's dimed"); //10
        lcd.setCursor(11, 0);
        lcd.print("     "); //5
    } else if (sensorValue < 200) {
        lcd.setCursor(0, 0);
        lcd.print("It's light"); //10
        lcd.setCursor(10, 0);
        lcd.print("     "); //5
    } else if (sensorValue < 256) {
        lcd.setCursor(0, 0);
        lcd.print("It's bright"); //11
        lcd.setCursor(11, 0);
        lcd.print("    "); //4
    }

    delay(1000);
}
