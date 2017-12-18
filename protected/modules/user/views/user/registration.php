<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Registration");
$this->breadcrumbs = array(
  UserModule::t("Registration"),
);
?>

  <h1><?php echo UserModule::t("Registration"); ?></h1>

<?php if (Yii::app()->user->hasFlash('registration')): ?>
  <div class="success">
    <?php echo Yii::app()->user->getFlash('registration'); ?>
  </div>
<?php else: ?>

  <div class="form">
    <?php $form = $this->beginWidget('UActiveForm', array(
      'id' => 'registration-form',
      'enableAjaxValidation' => TRUE,
      'action' => '/user/registration',
//	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
      'clientOptions' => array(
        'validateOnSubmit' => TRUE,
      ),
      'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
		    'onsubmit'=>"return false;",
      )
    )); ?>

    <p
      class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

    <?php echo $form->errorSummary(array($model, $profile)); ?>

    <div class="row">
      <?php echo $form->labelEx($model, 'username'); ?>
      <?php echo $form->textField($model, 'username'); ?>
      <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'password'); ?>
      <?php echo $form->passwordField($model, 'password'); ?>
      <?php echo $form->error($model, 'password'); ?>
      <p class="hint">
        <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
      </p>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'verifyPassword'); ?>
      <?php echo $form->passwordField($model, 'verifyPassword'); ?>
      <?php echo $form->error($model, 'verifyPassword'); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model, 'email'); ?>
      <?php echo $form->textField($model, 'email'); ?>
      <?php echo $form->error($model, 'email'); ?>
    </div>

    <?php if (UserModule::doCaptcha('registration')): ?>
      <div class="row">
        <?php echo $form->labelEx($model, 'verifyCode'); ?>

        <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textField($model, 'verifyCode'); ?>
        <?php echo $form->error($model, 'verifyCode'); ?>

        <p
          class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
          <br/><?php echo UserModule::t("Letters are not case-sensitive."); ?>
        </p>
      </div>
    <?php endif; ?>

    <div class="row submit">
      <?php echo CHtml::submitButton(UserModule::t("Register"),array('onclick'=>'send();')); ?>
    </div>

    <?php $this->endWidget(); ?>
  </div><!-- form -->

  <script type="text/javascript">

    function send() {

      var data1 = $("#registration-form").serialize();
      $.ajax({
        type: 'POST',
        url: '/user/registration',
        data: data1,
        success: function (data) {
          $('#dialog-form').empty().append(data);
          var parser = new DOMParser();
          var el = parser.parseFromString(data, "text/html");
          var by = el.getElementById('registration-form');
          if(!by) {
            location.reload();
          }
        },
        error: function (data) {
          console.log("Error occured.please try again");
        },
        dataType: 'html'
      });

    }

  </script>
<?php endif; ?>