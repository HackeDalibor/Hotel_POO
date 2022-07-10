<?php

    //! CREATION DE LA CLASSE :
    class Client
    {

        //! CREATION DE NOS VARIABLES :
        private string $nomClient;
        private string $prenomClient;
        private string $email;
        private string $numTel;
        private array  $reservations;

        //! DEBUT DE NOS FONCTIONS ET CREATION DU CONSTRUCT :
        public function __construct(string $nomClient, string $prenomClient, string $email, string $numTel)
        {
            $this->nomClient    = $nomClient;
            $this->prenomClient = $prenomClient;
            $this->email        = $email;
            $this->numTel       = $numTel;
            $this->reservations = [];
        }

        //! CREATION DE NOS PROPRES FONCTIONS :
        public function addReservation(Reservation $reservation)
        {
            $this->reservations[] = $reservation;
        }

        public function showReservation()
        {
            $resultat = "<h3>Réservation de $this</h3>";
            $resultat .="<span>".count($this->reservations)." réservation(s)</span><br/>";

            foreach ($this->reservations as $r)
            {
                $resultat .= "$r<br/>";
            }
            
            $resultat .= "<hr><br/>";
            
            return $resultat;
        }

        public function annulerReservationClient(Reservation $reserve)
        {
            foreach ($this->reservations as $key=>$value)
            {
                if ($value->getChambre()->getNbChambre() == $reserve->getChambre()->getNbChambre())
                {
                    unset($this->reservations[$key]);
                }
            }
        }
        //! FIN DE CREATION DE NOS PROPRES FONCTIONS 

        //! NOS GETTERS ET SETTERS :
        public function getNomClient(): string
        {
            return $this->nomClient;
        }

        public function setNomClient(string $nomClient): self
        {
            $this->nomClient = $nomClient;
            return $this;
        }

        public function getPrenomClient(): string
        {
            return $this->prenomClient;
        }

        public function setPrenomClient(string $prenomClient): self
        {
            $this->prenomClient = $prenomClient;
            return $this;
        }

        public function getEmail(): string
        {
            return $this->email;
        }

        public function setEmail(string $email): self
        {
            $this->email = $email;
            return $this;
        }

        public function getNumTel(): string
        {
            return $this->numTel;
        }

        public function setNumTel(string $numTel): self
        {
            $this->numTel = $numTel;
            return $this;
        }

        public function getReservations(): array
        {
            return $this->reservations;
        }

        public function setReservations(array $reservations): self
        {
            $this->reservations = $reservations;
            return $this;
        }
        //! FIN DE NOS GETTERS ET SETTERS

        //! NOS ToString :
        public function nomCompletClient()
        {
            //? Ici j'ai crée encore une fonction qui m'envoie la même chose que le ToString, mais sans <br>.
            //? Et donc je préfère l'appeler une fonction ToString même si ce n'est pas une fonction ToString(on ne peut en avoir qu'une).

            return $this->nomClient."&nbsp".$this->prenomClient;
        }

        public function __toString()
        {
            return $this->nomClient."&nbsp".$this->prenomClient."<br>";
        }
        
    }

?>