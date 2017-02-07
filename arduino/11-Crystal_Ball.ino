// Import the libary for the display
#include &#60;LiquidCrystal.h>
// The pins for communication with the display
LiquidCrystal lcd(12, 11, 5, 4, 3, 2);

// Creates the constant that are gonna be used in the code later on.
// set up a constant for the tilt switchPin
const int switchPin = 6;

// variable to hold the value of the switchPin
int switchState = 0;

// variable to hold previous value of the switchpin
int prevSwitchState = 0;

// a variable for the reply
int reply;

void setup() {
    // put your setup code here, to run once:
    // set up the number of columns and rows on the LCD
    lcd.begin(16, 2);

    // set up the switch pin as an input
    pinMode(switchPin, INPUT);

    // Print a message to the LCD.
    lcd.print("Ask the");

    // set the cursor to column 0, line 1
    // line 1 is the second row, since counting begins with 0
    lcd.setCursor(0,1);
    // print to the second line
    lcd.print("Crystal Ball!");
}

void loop() {
    // put your main code here, to run repeatedly:

    // check the status of the switch
    switchState = digitalRead(switchPin);

    // compare the switchState to its previous state
    if (switchState != prevSwitchState) {

        // if the state has changed from HIGH to LOW
        // you know that the ball has been tilted
        if (switchState == LOW) {
            // randomly chose a reply
            reply = random(8);
            // clean up the screen before printing a new reply
            lcd.clear();
            // set the cursor to column 0, line 0
            lcd.setCursor(0, 0);
            // print some text
            lcd.print("the ball says:");
            // move the cursor to the second line
            lcd.setCursor(0, 1);

              // choose a saying to print baed on the value in reply
            switch(reply){
                case 0:
                lcd.print("Yes");
                break;

                case 1:
                lcd.print("Most likely");
                break;

                case 2:
                lcd.print("Certainly");
                break;

                case 3:
                lcd.print("Outlook good");
                break;

                case 4:
                lcd.print("Unsure");
                break;

                case 5:
                lcd.print("Ask again");
                break;

                case 6:
                lcd.print("Doubtful");
                break;

                case 7:
                lcd.print("No");
                break;
            }
        }
    }
    // save the current switch state as the last state
    prevSwitchState = switchState;
}
