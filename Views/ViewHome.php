<?php

foreach ($home->lastInvoices as $lastInvoice){
    echo '<p>' . $lastInvoice->getRef() . '</p>';
}

?>