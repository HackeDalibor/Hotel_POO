<?php

    //! CREATION DE NOTRE CLASSE :
    class Reservation
    {

        //! CREATION DE NOS VARIABLES :
        private Client   $client;
        private Chambre  $chambre;
        private DateTime $dateArrivee;
        private DateTime $dateDepart;
        private int      $jours;

        //! DEBUT DE NOS FONCTIONS ET LA CREATION DE NOTRE CONSTRUCT :
        public function __construct(Client $client, Chambre $chambre, string $dateArrivee, string $dateDepart)
        {
            if (!$chambre->getStatutChambre())
            {
                $this->client      = $client;
                $this->chambre     = $chambre;
                $this->dateArrivee = new DateTime($dateArrivee);
                $this->dateDepart  = new DateTime($dateDepart);

                $chambre->setStatutChambre(true);
                $hotel = $chambre->getHotel();
                $hotel->addReservation($this);
                $client->addReservation($this);
                
                $this->jours = $this->dateArrivee->diff($this->dateDepart)->format("%d");
            }

            else
            {
                echo "Chambre déjà réservée :(";
                return;
            }
        }

        //! NOS GETTERS ET SETTERS :
        public function getClient(): Client
        {
            return $this->client;
        }

        public function setClient(Client $client): self
        {
            $this->client = $client;
            return $this;
        }

        public function getChambre(): Chambre
        {
            return $this->chambre;
        }

        public function setChambre(Chambre $chambre): self
        {
            $this->chambre = $chambre;
            return $this;
        }

        public function getDateArrivee(): DateTime
        {
            return $this->dateArrivee;
        }

        public function setDateArrivee(DateTime $dateArrivee): self
        {
            $this->dateArrivee = $dateArrivee;
            return $this;
        }

        public function getDateDepart(): DateTime
        {
            return $this->dateDepart;
        }

        public function setDateDepart(DateTime $dateDepart): self
        {
            $this->dateDepart = $dateDepart;
            return $this;
        }
        //! FIN DE NOS GETTERS ET SETTERS

        //! NOTRE PROPRE FONCTION :
        public function prixTotalSejour()
        {
            $prixTotal = $this->jours * $this->chambre->getPrix();
            return "Le prix total de M(me) ".$this->client->nomCompletClient()." à l'accueil de ".$this->getChambre()->getHotel()->getNomHotel()." est de $prixTotal $.";
        }

        //! NOTRE FONCTION ToString :
        public function __toString()
        {
            return "<strong> Hotel : ".$this->chambre->getHotel()."</strong> Chambre : ".$this->getChambre()." du ".$this->getDateArrivee()->format("d-m-Y")." au ".$this->getDateDepart()->format("d-m-Y");
        }

    }

?>