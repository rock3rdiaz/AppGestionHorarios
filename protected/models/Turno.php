<?php

/**
 * This is the model class for table "turno".
 *
 * The followings are the available columns in table 'turno':
 * @property integer $idTurno
 * @property string $nombre
 * @property integer $total_horas
 *
 * The followings are the available model relations:
 * @property Instructor[] $instructors
 * @property Calendario[] $calendarios
 * @property Horario[] $horarios
 */
class Turno extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Turno the static model class
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
		return 'turno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'required'),
			array('total_horas', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTurno, nombre, total_horas', 'safe', 'on'=>'search'),
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
			'instructors' => array(self::HAS_MANY, 'Instructor', 'Turno_idTurno'),
			'calendarios' => array(self::MANY_MANY, 'Calendario', 'turno_has_calendario(Turno_idTurno, Calendario_idCalendario)'),
			'horarios' => array(self::MANY_MANY, 'Horario', 'turno_has_horario(Turno_idTurno, Horario_idHorario)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTurno' => 'Id Turno',
			'nombre' => 'Nombre',
			'total_horas' => 'Total Horas',
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

		$criteria->compare('idTurno',$this->idTurno);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('total_horas',$this->total_horas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}