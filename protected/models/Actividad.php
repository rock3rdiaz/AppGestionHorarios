<?php

/**
 * This is the model class for table "actividad".
 *
 * The followings are the available columns in table 'actividad':
 * @property integer $idActividad
 * @property string $tipo
 * @property string $descripcion
 * @property string $lugar
 *
 * The followings are the available model relations:
 * @property Horario[] $horarios
 */
class Actividad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Actividad the static model class
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
		return 'actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, descripcion, lugar', 'required'),
			array('tipo, descripcion, lugar', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idActividad, tipo, descripcion, lugar', 'safe', 'on'=>'search'),
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
			'horarios' => array(self::MANY_MANY, 'Horario', 'actividad_has_horario(Actividad_idActividad, Horario_idHorario)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idActividad' => 'Id Actividad',
			'tipo' => 'Tipo',
			'descripcion' => 'Descripcion',
			'lugar' => 'Lugar',
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

		$criteria->compare('idActividad',$this->idActividad);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('lugar',$this->lugar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @summary: Metodo que permite obtener las actividades de acuerdo a su tipo y que se encuentran en el horario definido por los argumentos
	 * @param  [string] $tipo        [Tipo de la actividad: "clase_grupal" o "servicio_empresarial"]
	 * @param  [string] $dia         [Dia de la semana]
	 * @param  [string] $hora_inicio [Hora de inicio de la actividad]
	 * @param  [string] $hora_fin    [Hora de finalizacion de la actividad]
	 * @return [array]              [Listado de resultados]
	 */
	public function getActividad($tipo, $dia, $hora_inicio, $hora_fin){
		
		$criteria = new CDbCriteria();
		$criteria->select = "idActividad, descripcion";
		$criteria->join = "inner join actividad_has_horario as ah on ah.Actividad_idActividad = idActividad";
		$criteria->condition = "ah.Horario_idHorario in (select h.idHorario from horario as h where h.hora_inicio >= '$hora_inicio' and h.hora_fin <= '$hora_fin' and dia = '$dia')";
		$criteria->addCondition("tipo = '$tipo'");

		$data_provider = new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));

		return $data_provider->getData();
	}
}