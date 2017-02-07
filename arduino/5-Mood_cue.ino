// De libary wordt gemaakt
#include &#60;Servo.h>

Servo myServo;

int const potPin = A0;
int potVal;
int angle;

void setup() {
    //De servo zit op de anloge input 9
    myServo.attach(9);

    Serial.begin(9600);
}

void loop() {
    potVal = analogRead(potPin);
    Serial.print("potVal: ");
    Serial.print(potVal);
    // maakt de default waarde van een analoge input van 0 naar 1023 naar de graden die gebruikt moeten worden 0 naar 179 omdat de servo zo draait
    angle = map(potVal, 0, 1023, 0, 179);
    //Wordt geprint in de serialmonitorl
    Serial.print(", angle: ");
    Serial.println(angle);

    myServo.write(angle);
    delay(100);
}
