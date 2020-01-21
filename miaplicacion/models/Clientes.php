<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $Id_Usuario
 * @property string $Nombre_Cliente
 * @property string $Usuario_Cliente
 * @property int $Puntos
 * @property string $Contraseña
 * @property string $Email_Cliente
 * @property string $Fecha_Nacimiento
 * @property int $Baneado
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre_Cliente', 'Usuario_Cliente', 'Puntos', 'Contraseña', 'Email_Cliente', 'Fecha_Nacimiento'], 'required'],
            [['Puntos', 'Baneado'], 'integer'],
            [['Fecha_Nacimiento'], 'safe'],
            [['Nombre_Cliente', 'Usuario_Cliente', 'Contraseña', 'Email_Cliente'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Usuario' => 'Id Usuario',
            'Nombre_Cliente' => 'Nombre Cliente',
            'Usuario_Cliente' => 'Usuario Cliente',
            'Puntos' => 'Puntos',
            'Contraseña' => 'Contraseña',
            'Email_Cliente' => 'Email Cliente',
            'Fecha_Nacimiento' => 'Fecha Nacimiento',
            'Baneado' => 'Baneado',
        ];
    }
}
