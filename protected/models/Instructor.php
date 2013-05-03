<?php

/**
 * This is the model class for table "instructor".
 *
 * The followings are the available columns in table 'instructor':
 * @property integer $idInstructor
 * @property string $nombre
 * @property string $tipo
 * @property integer $Turno_idTurno
 *
 * The followings are the available model relations:
 * @property Incidencia[] $incidencias
 * @property Turno $turnoIdTurno
 */
class Instructor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Instructor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'instructor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, tipo, Turno_idTurno', 'required'),
			array('Turno_idTurno', 'numerical', 'integerOnly'=>true),
			array('nombre, tipo', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idInstructor, nombre, tipo, Turno_idTurno', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'incidencias' => array(self::HAS_MANY, 'Incidencia', 'Instructor_idInstructor'),
			'turnoIdTurno' => array(self::BELONGS_TO, 'Turno', 'Turno_idTurno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInstructor' => 'Id Instructor',
			'nombre' => 'Nombre',
			'tipo' => 'Tipo',
			'Turno_idTurno' => 'Turno Id Turno',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idInstructor',$this->idInstructor);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('Turno_idTurno',$this->Turno_idTurno);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}