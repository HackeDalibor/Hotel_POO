<?php

    //? On fait appel à nos fichiers PHP (on peut les appeler avec include mais il est plus facile de travailler avec require parce que le require nous affichera une erreur fatale dans notre index et le include va l'exclure dès qu'il rencontre un problème et va continuer à fonctionner).
    //! LIAISON DES FICHIERS :
    require "Hotel.php";
    require "Client.php";
    require "Chambre.php";
    require "Reservation.php";
    require "fonction.php";
    //? Ici on a créé un fichier pour chaque classe (il faut appeler le fichier par le même nom que la classe et mettre la majuscule sur la première lettre aussi), 4 en tout, et une fonction qu'on verra après.
 
    //? Comme nos fichiers sont déjà liés on va pouvoir créer nos objets par rapport aux classes qui se trouvent dessus.
    //! CREATION DE NOS OBJETS :
    //? On commence par nos objets "hôtel" et ainsi de suite.
    //! CREATION DES HOTELS :
    $hilton       = new Hotel("Hilton **** Strasbourg" , "10 route de la Gare"   , "67000", "STRASBOURG");
    $regent       = new Hotel("Hôtel Regent **** Paris", "3 chemin de la Liberté", "75000", "PARIS"     );
    //? Tout cet espace n'est pas nécessaire, mais je préfère avoir tout aligné.

    //! CREATION DES CLIENTS :
    $client1      = new Client("GIBELLO", "Virgille", "virgillegibello@cvraimentmoi.com", "06 87 33 36 54");
    $client2      = new Client("MURMANN", "Micka"   , "mickamurmann@cvraimentmoi.fr"    , "07 52 03 14 36");
    
    //! CREATION DES CHAMBRES :
    $chambre1     = new Chambre($hilton, "chambre n°3",  1, 230, true);
    $chambre5     = new Chambre($hilton, "chambre n°4",  2, 240, true);
    $chambre32    = new Chambre($regent, "chambre n°8",  2, 310, true);
    $chambre53    = new Chambre($hilton, "chambre n°5",  1, 270, true);
    $chambre20    = new Chambre($regent, "chambre n°6",  2, 190, true);
    $chambre16    = new Chambre($regent, "chambre n°12", 2, 220, true);
    $chambre9     = new Chambre($hilton, "chambre n°23", 1, 200, true);
    $chambre44    = new Chambre($hilton, "chambre n°35", 1, 280, true);
    
    //! CREATION DES RESERVATIONS :
    $reservation1 = new Reservation($client1, $chambre32, "2021-01-01", "2021-02-01");
    $reservation2 = new Reservation($client2, $chambre44, "2021-01-06", "2021-01-24");
    $reservation3 = new Reservation($client1, $chambre1 , "2021-01-03", "2021-01-07");
    //? Nos classes peuvent aussi être liées entre elles (dans cet exemple les chambres sont liées à l'hôtel, et la réservation est liée à client et à chambre), il y a plus d'infos dans nos classes. :)
    
    echo $client1->showReservation();
    echo $regent->showChambres();

    echo annulerReservation($client1, $regent, $reservation1);

    echo $client1->showReservation();
    echo $regent->showChambres();

    echo $reservation3->prixTotalSejour();

?>