<?php

class ChildrenController extends Controller
{
	public function actionIndex($sponsor = null)
	{
		$criteria=new CDbCriteria;
		if($sponsor != '')
			$criteria->addCondition('Sponsor='.$sponsor);
		
		$model = new Child('search');
		
		$dp = new CActiveDataProvider($model, array('criteria'=>$criteria));
		
		$this->render('index',array(
				'dp'=>$dp,
		));		
	}
	
	public function actionGallery()
	{
		$dataProvider=new CActiveDataProvider('Child');
		$this->render('gallery',array(
				'dataProvider'=>$dataProvider,
		));
	}
}

