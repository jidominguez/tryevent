<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $IdUsuario
 * @property string $Nombre
 * @property string $Usuario
 * @property int $Punto
 * @property string $Contrasenya
 * @property string $Email
 * @property string $Fecha_Nacimiento
 * @property int $Baneado
 * @property int $IdRol
 *
 * @property Entradas[] $entradas
 * @property HistorialComprasProductosCab[] $historialComprasProductosCabs
 * @property RolesDeUsuario $idRol
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Usuario', 'Contrasenya', 'Email', 'Fecha_Nacimiento', 'IdRol'], 'required'],
            [['IdUsuario', 'Punto', 'Baneado', 'IdRol'], 'integer'],
            [['Fecha_Nacimiento'], 'safe'],
            [['Nombre', 'Usuario', 'Contrasenya', 'Email'], 'string', 'max' => 45],
            [['IdUsuario'], 'unique'],
            [['IdRol'], 'exist', 'skipOnError' => true, 'targetClass' => RolesDeUsuario::className(), 'targetAttribute' => ['IdRol' => 'IdRol']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUsuario' => 'Id Usuario',
            'Nombre' => 'Nombre',
            'Usuario' => 'Usuario',
            'Punto' => 'Punto',
            'Contrasenya' => 'Contrasenya',
            'Email' => 'Email',
            'Fecha_Nacimiento' => 'Fecha Nacimiento',
            'Baneado' => 'Baneado',
            'IdRol' => 'Id Rol',
        ];
    }

    /**
     * Gets query for [[Entradas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntradas()
    {
        return $this->hasMany(Entradas::className(), ['IdCliente' => 'IdUsuario']);
    }

    /**
     * Gets query for [[HistorialComprasProductosCabs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHistorialComprasProductosCabs()
    {
        return $this->hasMany(HistorialComprasProductosCab::className(), ['IdUsuario' => 'IdUsuario']);
    }

    /**
     * Gets query for [[IdRol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdRol()
    {
        return $this->hasOne(RolesDeUsuario::className(), ['IdRol' => 'IdRol']);
    }
    //Esto es para registrar con los valores por defecto
    public function beforeSave($insert) {
        $x=rand();
        if(strlen($this->Contrasenya)!=32)
          $this->Contrasenya=md5($this->Contrasenya);
        if($this->isNewRecord) $this->Punto=0; $this->IdUsuario=$x; $this->Baneado=0;
        return parent::beforeSave($insert);
    }
}
