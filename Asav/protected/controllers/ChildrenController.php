<?php

class ChildrenController extends Controller
{
	public function actionIndex()
	{
		$model=new Child('search');
		$this->render('index',array(
				'model'=>$model,
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

