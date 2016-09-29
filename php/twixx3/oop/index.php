<?php
    class Hond{
        //eigenschappen
        public $naam; // public betekent dat $naam toegankelijk zal zijn voor iedereen
        public $aantaPoten;

        //de constructor word automatisch aangeroepen door php bij het aanmaken van object
        public function __construct($naam) { // __ construct wordt aangeroepen bij aanmaken nieuw object.
            $this->naam = $naam; // $this verwijst naar het huidige object
            $this->aantalPoten = 4;
        }

        //methode
        public function blaf(){
            echo "Wraf! Mijn naam is " . $this->naam . "! ik heb " . $this->aantalPoten . " poten!<br/>";
        }

        public function heeftAantalPoten($aantalPoten) {
            return ($aantalPoten === $this->aantalPoten);
        }
        public function setAantalPoten($aantalPoten) {
            $this->aantalPoten = $aantalPoten;
        }
    }



    // new maakt een nieuw object  aan
    $hondjeBallou = new Hond("Ballou");
    $hondjeLady   = new Hond("Lady");

    // Lady heeft tragisch gezien een pootje verloren in de oorlog in vietnam
    $hondjeLady->aantalPoten = 3;

    $hondjeBallou->setAantalPoten(2);

    //roept methode aan
    $hondjeBallou->blaf();
    $hondjeLady->blaf();

    $heeftLady4Poten = $hondjeLady->heeftAantalPoten(4);
    if($heeftLady4Poten) {
        echo "Lady heeft gezong en wel 4 poortjes. <br/>";
    } else {
        echo "Lady heeft helaas geen 4 pootje. manamanman! <br/>";
    }
?>


