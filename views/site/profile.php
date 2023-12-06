<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var Profil $profilAdatok */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Saját adatok';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Profil</h1>

<table>
    <tr>
        <th>Uranus kód</th>
        <td><?= $profilAdatok->uranuskod ?></td>
    </tr>
    <tr>
        <th>Név</th>
        <td><?= $profilAdatok->nev ?></td>
    </tr>
    <tr>
        <th>E-mail cím</th>
        <td><?= $profilAdatok->email ?></td>
    </tr>
</table>