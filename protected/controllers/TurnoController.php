<?php

class TurnoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Turno;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turno']))
		{
			$model->attributes                  = $_POST['Turno'];

			$datos_horarios = CJSON::decode($_POST['datos_horarios']);
			$model->total_horas = count($datos_horarios);//Almacenamos el campo 'total_horas' asociado a la tabla 'Turno'.

			if($model->save()){				
				
				foreach($datos_horarios as $data){
					$model_horario = new Horario();

					$model_horario->dia         = $data['dia'];
					$model_horario->hora_inicio = $data['hora_inicio'];
					$model_horario->hora_fin    = $data['hora_fin'];

					$model_turno_horario = new TurnoHasHorario();

					try{
						$model_horario->save();

						/*Almaceno la relacion entre las tablas 'Turno' y 'Horario' por medio de la tabla puente 'Turno_has_Horario'.*/
						$model_turno_horario->Turno_idTurno     = $model->getPrimaryKey();
						$model_turno_horario->Horario_idHorario = $model_horario->getPrimaryKey();
						$model_turno_horario->save();
					}
					catch(CDbException $e){

						/*Almaceno la relacion entre las tablas 'Turno' y 'Horario' por medio de la tabla puente 'Turno_has_Horario' cargando el modelo existente en la tabla 'Horario'.*/
						$model_horario_existente = Horario::model()->findByAttributes(array('dia'=>$data['dia'], 'hora_inicio'=>$data['hora_inicio'], 'hora_fin'=>$data['hora_fin']));

						$model_turno_horario->Turno_idTurno     = $model->getPrimaryKey();
						$model_turno_horario->Horario_idHorario = $model_horario_existente->getPrimaryKey();
						$model_turno_horario->save();
						continue;
					}
				}

				$this->redirect(array('view','id'=>$model->idTurno));
			}				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		$model_turno_horarios   = TurnoHasHorario::model()->findAllByAttributes(array('Turno_idTurno'=>$model->getPrimaryKey()));
		
		//Creo un array con todos los horarios asociados al turno que deseeo actualizar.
		foreach($model_turno_horarios as $horario){
			$horarios[] = Horario::model()->findByPk($horario->Horario_idHorario);
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Turno']))
		{
			$model->attributes                  = $_POST['Turno'];

			$datos_horarios     = CJSON::decode($_POST['datos_horarios']);
			$model->total_horas = count($datos_horarios);//Almacenamos el campo 'total_horas' asociado a la tabla 'Turno'.

			if($model->update()){

				//Elimino todos los horarios asociados al turno para crear los nuevos enviados desde el formulario.
				for($i = 0; $i < count($model_turno_horarios); $i++){
					$model_turno_horarios[$i]->delete();
					//Si el horario a borrar pertenece a otro turno, se debe capturar la excepcion generada por la violacion de la integridad referencial.
					try{
						$horarios[$i]->delete();
					}
					catch(CDbException $e){
						continue;
					}
				}

				foreach($datos_horarios as $data){
					$model_horario = new Horario();

					$model_horario->dia         = $data['dia'];
					$model_horario->hora_inicio = $data['hora_inicio'];
					$model_horario->hora_fin    = $data['hora_fin'];

					$model_turno_horario = new TurnoHasHorario();

					try{
						$model_horario->save();

						/*Almaceno la relacion entre las tablas 'Turno' y 'Horario' por medio de la tabla puente 'Turno_has_Horario'.*/
						$model_turno_horario->Turno_idTurno     = $model->getPrimaryKey();
						$model_turno_horario->Horario_idHorario = $model_horario->getPrimaryKey();
						$model_turno_horario->save();
					}
					catch(CDbException $e){

						/*Almaceno la relacion entre las tablas 'Turno' y 'Horario' por medio de la tabla puente 'Turno_has_Horario' cargando el modelo existente en la tabla 'Horario'.*/
						$model_horario_existente = Horario::model()->findByAttributes(array('dia'=>$data['dia'], 'hora_inicio'=>$data['hora_inicio'], 'hora_fin'=>$data['hora_fin']));

						$model_turno_horario->Turno_idTurno     = $model->getPrimaryKey();
						$model_turno_horario->Horario_idHorario = $model_horario_existente->getPrimaryKey();
						$model_turno_horario->save();
						continue;
					}
				}
				$this->redirect(array('view','id'=>$model->idTurno));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'horarios'=>$horarios,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Turno');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Turno('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Turno']))
			$model->attributes=$_GET['Turno'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Turno::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='turno-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
