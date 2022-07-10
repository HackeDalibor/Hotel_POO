<?php

    //! CREATION DE NOTRE CLASSE :
    class Chambre
    {

        //! CREATION DE NOS VARIABLES :
        private Hotel        $hotel;
        private string       $nbChambre;
        private int          $nbLits;
        private bool         $wifi;
        private bool         $statutChambre;
        private static array $chambres;
        private int          $prix;

        //! DEBUT DE NOS FONCTIONS ET CREATION DE NOTRE CONSTRUCT :
        public function __construct(Hotel $hotel, string $nbChambre, int $nbLits, int $prix, bool $wifi=true)
        {
            $this->hotel         = $hotel;
            $this->nbChambre     = $nbChambre;
            $this->nbLits        = $nbLits;
            $this->wifi          = $wifi;
            $this->statutChambre = false;
            $this->prix          = $prix;
            self::$chambres[]    = $this;
            
            $hotel->addChambres($this);
        }

        //! NOS GETTERS ET SETTERS :
        public function getHotel(): Hotel
        {
            return $this->hotel;
        }

        public function setHotel(Hotel $hotel): self
        {
            $this->hotel = $hotel;
            return $this;
        }

        public function getNbChambre(): string
        {
            return $this->nbChambre;
        }

        public function setNbChambre(string $nbChambre): self
        {
            $this->nbChambre = $nbChambre;
            return $this;
        }

        public function getNbLits(): int
        {
            return $this->nbLits;
        }

        public function setNbLits(int $nbLits): self
        {
            $this->nbLits = $nbLits;
            return $this;
        }

        public function getWifi()
        {
            $isWifi = ($this->wifi)? "oui" : "non";
            return $isWifi;
        }

        public function setWifi(bool $wifi): self
        {
            $this->wifi = $wifi;
            return $this;
        }

        public function getStatutChambre(): bool
        {
            return $this->statutChambre;
        }

        public function getChambreDispo()
        {
            $chambreDispo = ($this->statutChambre)? "Non Dispo" : "Dispo";
            return $chambreDispo;
        }

        public function setStatutChambre(bool $statutChambre)
        {
            $this->statutChambre = $statutChambre;

        }

        public function getPrix(): int
        {
            return $this->prix;
        }

        public function getAfficherPrix()
        {
            return $this->prix." $";
        }

        public function setPrix(int $prix): self
        {
            $this->prix = $prix;
            return $this;
        }

        public function getChambres(): array
        {
            return self::$chambres;
        }
        //! FIN DE NOS GETTERS ET SETTERS

        //! NOTRE ToString :
        public function __toString()
        {
            $isWifi = ($this->wifi)? "oui" : "non";
            return $this->nbChambre."( ".$this->nbLits." lits - ".$this->prix." $ - wifi : $isWifi )<br/>"."(".$this->statutChambre.")";
        }
    }

?>