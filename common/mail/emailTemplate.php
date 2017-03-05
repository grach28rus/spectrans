<?php
/**
 * @var $paramsTemplate \frontend\models\ContactForm
 */

?>

<table>
    <tr>
        <td><b>Имя:</b></td>
        <td><?= $paramsTemplate->name ?></td>
    </tr>
    <tr>
        <td><b>Email:</b></td>
        <td><?= $paramsTemplate->email ?></td>
    </tr>
    <tr>
        <td><b>Номер тедефона:</b></td>
        <td><?= $paramsTemplate->number ?></td>
    </tr>
    <tr>
        <td><b>Сообщение:</b></td>
        <td><?= $paramsTemplate->body ?></td>
    </tr>
</table>
