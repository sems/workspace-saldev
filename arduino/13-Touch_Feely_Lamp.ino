#include &#60;CapacitiveSensor.h>
//Tells which pins you use to send info.
//In this Case pin 4 sends the sensor trogh the material
// Pin 2 creates the sence.
CapacitiveSensor capSensor(4,2);

//When the lamp is going to turn on
int threshold = 700;

//The Pin for the LED
const int ledPin = 12;
void setup() {
// put your setup code here, to run once:
//The connection starts
Serial.begin(9600);
//Set Led as an output
pinMode(ledPin, OUTPUT);
}

void loop() {
    // put your main code here, to run repeatedly:
    //Hold a long for storing the varible
    //capacitiveSensor is a function that takes samples of the sensor. In this case it takes 30samples.
    long sensorValue = capSensor.capacitiveSensor(30);
    //Prints the values in the serialmonitor.
    Serial.println(sensorValue);

    //Check if the sensorvalue is higher as the threshold.
    if(sensorValue > threshold) {
        // If yes turn on LED
        digitalWrite(ledPin, HIGH);
    } else {
        // If not don't turn it on.
        digitalWrite(ledPin, LOW);
    }
    delay(10);
}
