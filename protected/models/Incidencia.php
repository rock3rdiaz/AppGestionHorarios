<?php

/**
 * This is the model class for table "incidencia".
 *
 * The followings are the available columns in table 'incidencia':
 * @property integer $idIncidencia
 * @property integer $Instructor_idInstructor
 * @property integer $Horario_idHorario
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Instructor $instructorIdInstructor
 * @property Horario $horarioIdHorario
 */
class Incidencia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Incidencia the static model class
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
		return 'incidencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Instructor_idInstructor, Horario_idHorario, descripcion', 'required'),
			array('Instructor_idInstructor, Horario_idHorario', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idIncidencia, Instructor_idInstructor, Horario_idHorario, descripcion', 'safe', 'on'=>'search'),
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
			'instructorIdInstructor' => array(self::BELONGS_TO, 'Instructor', 'Instructor_idInstructor'),
			'horarioIdHorario' => array(self::BELONGS_TO, 'Horario', 'Horario_idHorario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idIncidencia' => 'Id Incidencia',
			'Instructor_idInstructor' => 'Instructor Id Instructor',
			'Horario_idHorario' => 'Horario Id Horario',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idIncidencia',$this->idIncidencia);
		$criteria->compare('Instructor_idInstructor',$this->Instructor_idInstructor);
		$criteria->compare('Horario_idHorario',$this->Horario_idHorario);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}