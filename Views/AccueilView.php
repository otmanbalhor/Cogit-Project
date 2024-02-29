<?php

foreach ($invoices as $invoice): ?>
<p><?=$invoice->getRef()?></p>
<p><?=$invoice->getDue_date()?></p>
<p><?=$invoice->getCreated_at()?></p>
<p><?=$invoice->getUpdate_at()?></p>
<?php endforeach; ?>