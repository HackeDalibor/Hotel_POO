<?php

    //? Tout d'abord la création de la classe, comme dit dans l'index il faut appeler la classe et le fichier dans lequel on la stocke par le même nom pour que le PHP comprenne que c'est un fichier classe, pour qu'on puisse mieux se situer et pour que notre fichier soit moins volumineux. Par exemple si on avait qu'un seul fichier avec toutes ces classes notre fichier aura 4x plus de lignes que maintenant.
    //? Une classe est composée des variables(privées, publiques, protégées) et des fonctions(fonctions magiques ou nos propres fonctions). On les appelle aussi les attributs et les méthodes.
    //! CREATION DE LA CLASSE :
    class Hotel
    {

        //? Ici on trouvera ce que notre objet aura dans sa possession. Pour mieux comprendre je vais vous donner un exemple d'ordinateur : On trouvera plusieurs composants dans un ordinateur, notre objet de base, (carte mère, processeur etc...) et ces composants sont ceux que chaque ordinateur doit avoir. Ces composants sont ceux qu'on citera tout au début de notre classe.
        //? Dans ce cas nos soit disant composants seront les variables(ou attributs) d'un type(string, int, array, Class ...) précis de variables et de leur état(private, protected, public).
        //! CREATION DE NOS VARIABLES :
        private string $nomHotel;
        private string $adresseHotel;
        private string $cpHotel;
        private string $villeHotel;
        private array  $chambres;
        private array  $reservations;

        //? Le construct est une méthode magique qui construit un nouveau pool de workers. Les pools créent paresseusement leurs threads, ce qui signifie que les nouveaux threads ne seront générés que lorsqu'ils sont requis pour exécuter des tâches.
        //? Entre les parenthèses de n'importe quelle fonction sera la variable que le client va instancier. Prenons l'exemple de notre ordi d'avant, cet ordi doit avoir un processeur et ce processeur ve avoir une marque(ex: ryzen ou intel) etc.. C'est un peu la marque de notre processeur.
        //? Ici on aura besoin d'un nom de l'hôtel, d'une adresse, d'un cp et d'une ville. Donc en créant un nouvel objet, cet objet va attendre ces infos de nous.
        //? Il faut savoir que l'on ne peut pas mettre toutes les variables dans notre construct, certaines variables vont être utilisées pour les fonctions et elles auront pas forcément besoin d'être instanciées.
        //! DEBUT DE NOS FONCTIONS ET CREATION DE NOTRE CONSTRUCT :
        public function __construct(string $nomHotel, string $adresseHotel, string $cpHotel, string $villeHotel)
        {
            $this->nomHotel     = $nomHotel;
            $this->adresseHotel = $adresseHotel;
            $this->cpHotel      = $cpHotel;
            $this->villeHotel   = $villeHotel;
            $this->chambres     = [];
            $this->reservations = [];
        }

        //? A savoir que notre classe aura ce qu'on appelle des getters et des setters et nos propres variables de plus, donc il faut bien différencier les deux pour ne pas se perdre dans notre classe.
        //? Nos fonctions sont appelées directement dans l'index avec le nom de notre objet suivi d'une flèche simple et le nom de la fonction(argument si nécessaire).
        //! NOS PROPRES FONCTIONS :
        public function addReservation(Reservation $reservation)
        {
            //? Ceci est une fonction nous permettant d'ajouter une réservation  dans notre table de réservations.

            $this->reservations[] = $reservation;
        }

        public function addChambres(Chambre $chambre)
        {
            //? Ceci est une fonction nous permettant d'ajouter une nouvelle chambre dans notre hôtel.

            $this->chambres[] = $chambre;
        }

        public function showChambres()
        {
            //? Cette fonction nous renvoie un tableau nous permettant de voir toutes les chambres de l'hôtel et leurs caractéristiques.

            echo "Statut des chambres de <strong>".$this->nomHotel."</strong>
            <table>
                <thead>
                    <tr>
                        <th><strong>Chambre n°</strong></th>
                        <th><strong>Nombre de Lits</strong></th>
                        <th><strong>Prix</strong></th>
                        <th><strong>Wifi</strong></th>
                        <th><strong>Etat</strong></th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($this->chambres as $chambre)
                {
                    //? Un argument nous permettant d'afficher les caractéristiques de toutes nos chambres.
                    //? Pour chaque chambre dans notre tableau $chambres, afficher :

                    echo "<tr>
                            <td>".$chambre->getNbChambre()."</td>",
                            "<td>".$chambre->getNbLits()."</td>",
                            "<td>".$chambre->getAfficherPrix()."</td>",
                            "<td>".$chambre->getWifi()."</td>",
                            "<td>".$chambre->getChambreDispo()."</td>
                        </tr>";
                }
            echo "</tbody>
            </table>";
        }
            
        public function annulerReservationHotel(Reservation $reserve)
        {
            //? Cette foncton est un peu particulière, elle supprime la réservation depuis l'hôtel et est appelée dans notre fichier fonction.

            foreach ($this->reservations as $value)
            {
                //? pour chaque valeur de ce tableau réservation, faire :

                if ($value->getChambre()->getNbChambre() == $reserve->getChambre()->getNbChambre())
                {
                    //? Ici on trouve quelque chose qui s'appelle une méthode de chaînage, c'est une façon de de trouver ce qu'on a besoin à travers d'autres variables et fonctions.

                    $reserve->getChambre()->setStatutChambre(false);
                    //? Si notre chambre se retrouve dans l'objet Reservation, passer le statut de chambre à false.
                    //? Autrement dit si la chambre existe et est prise, elle sera libre.
                }
            }
        }
        //! FIN DE NOS PROPRES FONCTIONS

        //! NOS GETTERS ET SETTERS :
        public function getNomHotel(): string
        {
            return $this->nomHotel;
        }
        
        public function setNomHotel(string $nomHotel): self
        {
            $this->nomHotel = $nomHotel;
            return $this;
        }

        public function getAdresseHotel(): string
        {
            return $this->adresseHotel;
        }

        public function setAdresseHotel(string $adresseHotel): self
        {
            $this->adresseHotel = $adresseHotel;
            return $this;
        }

        public function getCpHotel(): string
        {
            return $this->cpHotel;
        }
        
        public function setCpHotel(string $cpHotel): self
        {
            $this->cpHotel = $cpHotel;
            return $this;
        }

        public function getVilleHotel(): string
        {
            return $this->villeHotel;
        }
        
        public function setVilleHotel(string $villeHotel): self
        {
            $this->villeHotel = $villeHotel;
            return $this;
        }
        
        public function getChambres(): array
        {
            return $this->chambres;
        }

        public function setChambres(array $chambres): self
        {
            $this->chambres = $chambres;
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
        
        public function getChambre(): Chambre
        {
            return $this->chambre;
        }
        
        public function setChambre(Chambre $chambre): self
        {
            $this->chambre = $chambre;
            return $this;
        }

        public function getReservation(): Reservation
        {
            return $this->reservation;
        }

        public function setReservation(Reservation $reservation): self
        {
            $this->reservation = $reservation;
            return $this;
        }
        //! FIN DE NOS GETTERS ET SETTERS
        
        //? Ceci est aussi une méthode magique, mais celle-ci crée une représentation textuelle de l'objet.
        //? C'est-à-dire on va retrouver un texte quand on veut afficher notre objet.
        //? Et elle ne contient pas les paramètres.
        //! NOTRE FONCTION ToString :
        public function __toString()
        {
            return "<h3>".$this->nomHotel." ".$this->villeHotel."</h3>".
            $this->adresseHotel."<br>";
        }
    }
    
?>