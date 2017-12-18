<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('maxlength'=>255,  'class' => "form-control")); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
			'model'=>$model,
			'attribute'=>'content',
			'config' => array(
				'toolbar'=>array(
					array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike' ),
					array( 'Image', 'Link', 'Unlink', 'Anchor' ) ,
				),
			),
		)); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
<!--		--><?php //echo $form->textField($model,'category_id', array('class' => "form-control")); ?>
		<?php
		$list = Category::getCategoryList();
		echo $form->dropDownList($model, 'category_id', $list, array('class' => "form-control")); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model, 'status',
			array('0' => "Do not publish", '1' => "Publish"),
			array(
				'class' => "form-control",
				'options' => array(
					1 => array('selected' => 'selected')
				)
			)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pub_date'); ?>
<!--		--><?php //echo $form->textField($model,'pub_date', array('class' => "form-control")); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
			'model' => $model,
			'attribute' => 'pub_date',
			'options'=>array(
				'showAnim'=>'clip',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
			),
			'htmlOptions'=>array(
				'class' => "form-control",
			),
		));
		?>
		<?php echo $form->error($model,'pub_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => "btn btn-success")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->