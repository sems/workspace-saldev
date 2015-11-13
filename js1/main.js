// jouw functies hier:
    
    var vermenigvuldig = function(getal1, getal2, getal3) {
        var resultaat = (getal1 * getal2 * getal3);
    
    return resultaat;
};
    var optellen = function(nummer1, nummer2, nummer3) {
        var uitkomst = (nummer1 + nummer2 + nummer3);
    
    return uitkomst;
};    

    var isEven = function(getal) {
        if(getal % 2 == 0) {
        return true;
            } else{
        return false;
 }
};

    var isUneven = function(getal) {
        if(getal % 2 != 0) {
        return true;
            } else{
        return false;
 }
};
//opdracht 21
var gemiddeldArray = function(array) {
    som = 0
        for(var teller = 0; teller < array.length; teller += 1 ){
    som += array[teller];
    };
        return som / array.length ;
};



// einde van jouw functies


// IE9 en hoger, maar dat is prima voor deze opdrachten
window.addEventListener("load", function(event) {
    // jouw code komt allemaal hier, behalve de functies die je maakt.
    //opdracht 4
    alert("Hello World!!"); 
    //opdracht 5
    var leeftijdNouk = 6;
    var leeftijdZeb = 7;
    var leeftijdSem = 17;
    //opdracht 6
    var som = leeftijdNouk + leeftijdZeb + leeftijdSem;
    //opdracht 7
    var naam = "Sem"
    var oneLiner = "Just do it!"
    //opdracht 8
    var koptekst = naam + " - " + oneLiner;
    
    //opdracht 11
    /*
        zoek de HTML elementen die we net hebben toegevoegd, 
        zodat we die vanuit javascript kunnen manipuleren. 
        getElementById betekent zoek element met een bepaald 
        id en geef die terug. Vervolgens komt die waarde in een
        variabel te staan in ons geval, namelijk kopje en 
        resultaat.
    */
    var kopje = document.getElementById("koptekst");
    var resultaat = document.getElementById("resultaat");
    //opdracht 12/13
    kopje.innerHTML += "Dit is nieuwe tekst!" + "<br />"; 
    
    //opdracht 14
    resultaat.innerHTML += leeftijdNouk + "+" + leeftijdZeb + "+" + leeftijdSem + "=" + som + "<br />" 
    
    
        var drieSom = vermenigvuldig(4, 3, 1);
    resultaat.innerHTML += drieSom + "<br />";
 
        var drieKeer = optellen(44, 33, 11);
    resultaat.innerHTML += drieKeer + "<br />";
    resultaat.innerHTML += isEven(drieSom) + "<br/>";

    
    
    for(var teller = 0; teller <= 15; teller++) {
        /*
            Voer hier jouw isEven functie uit met als argument teller 
            sla het resultaat op in een variabel genaamd even.
            vergeet niet de waarden in de for loop te veranderen, zoals 
            teller+=7 en teller < 100!!!
        */
    var even = isEven(teller)
        if(even == true) {
            resultaat.innerHTML += "Even getal: " + teller + "<br />";
  };
 };
    
    var lijst = [0,100,200,300,400,500]

    resultaat.innerHTML += gemiddeldArray(lijst) + "<br />";
 


});
