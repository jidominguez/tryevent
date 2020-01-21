<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles_de_usuario".
 *
 * @property int $IdRol
 * @property string $Descrip
 *
 * @property Usuarios[] $usuarios
 */
class RolesDeUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles_de_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdRol', 'Descrip'], 'required'],
            [['IdRol'], 'integer'],
            [['Descrip'], 'string', 'max' => 45],
            [['IdRol'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdRol' => 'Id Rol',
            'Descrip' => 'Descrip',
        ];
    }

    /**
     * Gets query for [[Usuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['IdRol' => 'IdRol']);
    }
}
