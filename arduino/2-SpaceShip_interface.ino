int switchState = 0;

void setup() {
    pinMode(3, OUTPUT);
    pinMode(4, OUTPUT);
    pinMode(5, OUTPUT);
    pinMode(2, INPUT);
}
void loop() {
    switchState = digitalRead(2);
    if (switchState == LOW) {
        //if the button is pressed
        digitalWrite(3, HIGH);//green LED
        digitalWrite(4, LOW); //red LED
        digitalWrite(5, LOW); //red LED
    } else {
        digitalWrite(3, LOW);
        digitalWrite(4, LOW);
        digitalWrite(5, HIGH);

        delay(250); //wait for 0.25 second
        //togle the LED's*
        digitalWrite(4, HIGH);
        digitalWrite(5, LOW);
        delay(250); //wait for 0.25 second
    }
} // te loop starts again
