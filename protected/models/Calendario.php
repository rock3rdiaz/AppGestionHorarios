<?php

/**
 * This is the model class for table "calendario".
 *
 * The followings are the available columns in table 'calendario':
 * @property integer $idCalendario
 * @property string $fecha_inicial
 * @property string $fecha_final
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Turno[] $turnos
 */
class Calendario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Calendario the static model class
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
		return 'calendario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_inicial, fecha_final, estado', 'required'),
			array('estado', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCalendario, fecha_inicial, fecha_final, estado', 'safe', 'on'=>'search'),
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
			'turnos' => array(self::MANY_MANY, 'Turno', 'turno_has_calendario(Calendario_idCalendario, Turno_idTurno)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCalendario' => 'Id Calendario',
			'fecha_inicial' => 'Fecha Inicial',
			'fecha_final' => 'Fecha Final',
			'estado' => 'Estado',
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

		$criteria->compare('idCalendario',$this->idCalendario);
		$criteria->compare('fecha_inicial',$this->fecha_inicial,true);
		$criteria->compare('fecha_final',$this->fecha_final,true);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}