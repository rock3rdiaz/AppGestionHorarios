<?php

/**
 * This is the model class for table "actividad_has_horario".
 *
 * The followings are the available columns in table 'actividad_has_horario':
 * @property integer $Actividad_idActividad
 * @property integer $Horario_idHorario
 */
class ActividadHasHorario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ActividadHasHorario the static model class
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
		return 'actividad_has_horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Actividad_idActividad, Horario_idHorario', 'required'),
			array('Actividad_idActividad, Horario_idHorario', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Actividad_idActividad, Horario_idHorario', 'safe', 'on'=>'search'),
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
			'Actividad_idActividad' => 'Actividad Id Actividad',
			'Horario_idHorario' => 'Horario Id Horario',
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

		$criteria->compare('Actividad_idActividad',$this->Actividad_idActividad);
		$criteria->compare('Horario_idHorario',$this->Horario_idHorario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}