<?php

foreach ($invoices as $invoice): ?>
<p><?=$invoice->getId()?></p>
<p><?=$invoice->getRef()?></p>
<p><?=$invoice->getCreated_at()?></p>
<p><?=$invoice->getUpdate_at()?></p>
<?php endforeach; ?>