<?php

/**
 * This is the model class for table "turno_has_calendario".
 *
 * The followings are the available columns in table 'turno_has_calendario':
 * @property integer $Turno_idTurno
 * @property integer $Calendario_idCalendario
 */
class TurnoHasCalendario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TurnoHasCalendario the static model class
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
		return 'turno_has_calendario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Turno_idTurno, Calendario_idCalendario', 'required'),
			array('Turno_idTurno, Calendario_idCalendario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Turno_idTurno, Calendario_idCalendario', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Turno_idTurno' => 'Turno Id Turno',
			'Calendario_idCalendario' => 'Calendario Id Calendario',
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

		$criteria->compare('Turno_idTurno',$this->Turno_idTurno);
		$criteria->compare('Calendario_idCalendario',$this->Calendario_idCalendario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}