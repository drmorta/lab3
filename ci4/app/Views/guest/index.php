<h2><?= esc($title) ?></h2>

<?php if (! empty($guest) && is_array($guest)): ?>

    <?php foreach ($guest as $guest_item): ?>

        <div class="main">
		<br>
		<b>
		<table>
		<tr>
		<th>-----</th>
		 <th><?= esc($guest_item['name']) ?> </th>
         <th><?= esc($guest_item['email']) ?> </th>
		 <th><?= esc($guest_item['comment']) ?> </th>
		</tr>
		</table>
        </div>
    <?php endforeach ?>

<?php else: ?>
    <h3>No guest</h3>
    <p>Unable to find any guest for you.</p>

<?php endif ?>