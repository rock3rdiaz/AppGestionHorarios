<?php

/**
 * This is the model class for table "programacion".
 *
 * The followings are the available columns in table 'programacion':
 * @property integer $idProgramacion
 * @property integer $Horario_idHorario
 * @property integer $Actividad_idActividad
 * @property integer $Instructor_idInstructor
 * @property integer $Calendario_idCalendario
 * @property integer $Incidencia_idIncidencia
 *
 * The followings are the available model relations:
 * @property Horario $horarioIdHorario
 * @property Actividad $actividadIdActividad
 * @property Instructor $instructorIdInstructor
 * @property Calendario $calendarioIdCalendario
 * @property Incidencia $incidenciaIdIncidencia
 */
class Programacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Programacion the static model class
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
		return 'programacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Horario_idHorario, Actividad_idActividad, Instructor_idInstructor, Calendario_idCalendario', 'required'),
			array('Horario_idHorario, Actividad_idActividad, Instructor_idInstructor, Calendario_idCalendario, Incidencia_idIncidencia', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProgramacion, Horario_idHorario, Actividad_idActividad, Instructor_idInstructor, Calendario_idCalendario, Incidencia_idIncidencia', 'safe', 'on'=>'search'),
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
			'horarioIdHorario' => array(self::BELONGS_TO, 'Horario', 'Horario_idHorario'),
			'actividadIdActividad' => array(self::BELONGS_TO, 'Actividad', 'Actividad_idActividad'),
			'instructorIdInstructor' => array(self::BELONGS_TO, 'Instructor', 'Instructor_idInstructor'),
			'calendarioIdCalendario' => array(self::BELONGS_TO, 'Calendario', 'Calendario_idCalendario'),
			'incidenciaIdIncidencia' => array(self::BELONGS_TO, 'Incidencia', 'Incidencia_idIncidencia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProgramacion' => 'Id Programacion',
			'Horario_idHorario' => 'Horario Id Horario',
			'Actividad_idActividad' => 'Actividad Id Actividad',
			'Instructor_idInstructor' => 'Instructor Id Instructor',
			'Calendario_idCalendario' => 'Calendario Id Calendario',
			'Incidencia_idIncidencia' => 'Incidencia Id Incidencia',
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

		$criteria->compare('idProgramacion',$this->idProgramacion);
		$criteria->compare('Horario_idHorario',$this->Horario_idHorario);
		$criteria->compare('Actividad_idActividad',$this->Actividad_idActividad);
		$criteria->compare('Instructor_idInstructor',$this->Instructor_idInstructor);
		$criteria->compare('Calendario_idCalendario',$this->Calendario_idCalendario);
		$criteria->compare('Incidencia_idIncidencia',$this->Incidencia_idIncidencia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}