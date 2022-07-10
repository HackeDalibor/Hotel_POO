<?php

    function annulerReservation($client, $hotel, $reservation)
    {
        $hotel->annulerReservationHotel($reservation);
        $client->annulerReservationClient($reservation);
    }

?>