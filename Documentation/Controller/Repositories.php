<?php

namespace Numbers\Projects\Documentation\Controller;
class Repositories extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Projects\Documentation\Form\List2\Repositories([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Projects\Documentation\Form\Repositories([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Projects\Documentation\Form\Repositories',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}