<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profil".
 *
 * @property int $id
 * @property string $uranuskod
 * @property string $nev
 * @property string $email
 *
 * @property User $user
 */
class Profil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uranuskod', 'nev', 'email'], 'required'],
            [['uranuskod'], 'string', 'max' => 10],
            [['nev', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uranuskod' => 'Uranus kód',
            'nev' => 'Név',
            'email' => 'E-mail cím',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['uranuskod' => 'uranuskod']);
    }
}