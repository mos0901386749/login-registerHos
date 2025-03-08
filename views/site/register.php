<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile(Yii::$app->request->baseUrl . '/css/register.css', ['depends' => [yii\bootstrap5\BootstrapAsset::class]]);


$this->title = 'ลงทะเบียน';
?>

<!-- Modal ยอมรับข้อตกลง -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ข้อตกลงและเงื่อนไขการใช้บริการ</h5>
            </div>
            <div class="modal-body">
                <p>โปรดอ่านและยอมรับข้อตกลงก่อนดำเนินการลงทะเบียน</p>
                <ul>
                    <li>ข้อมูลที่กรอกต้องเป็นความจริง</li>
                    <li>ระบบจะใช้ข้อมูลนี้สำหรับการเข้าใช้งานอินเทอร์เน็ต</li>
                    <li>ห้ามนำบัญชีไปใช้ในทางที่ผิดกฎหมาย</li>
                </ul>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="agreeTerms">
                    <label class="form-check-label" for="agreeTerms">ฉันยอมรับข้อตกลง</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="acceptTerms" disabled>ดำเนินการต่อ</button>
            </div>
        </div>
    </div>
</div>




<div id="registrationContainer" class="container mt-5" style="display: none;">


    <!-- ฟอร์มลงทะเบียน -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow p-4">
                <h3 class="text-center">กรุณากรอกเช็คข้อมูลให้ถูกต้อง</h3><br>
                <?php $form = ActiveForm::begin(); ?>

                <h4>ข้อมูลส่วนบุคคล</h4><br>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'title_th')->textInput(['readOnly' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'title_en')->textInput(['readOnly' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'firstname_th')->textInput(['readOnly' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'lastname_th')->textInput(['readOnly' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'provider_id')->textInput(['readOnly' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'date_of_birth')->textInput(['readOnly' => true]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput(['readOnly' => true]) ?>
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col text-center">
                        <?= Html::submitButton('ลงทะเบียน', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<< JS
$(document).ready(function() {
    // บังคับให้แสดง Modal ก่อน
    $('#termsModal').modal({backdrop: 'static', keyboard: false});
    $('#termsModal').modal('show');

    // เช็คว่าติ๊กช่อง "ยอมรับข้อตกลง" หรือยัง
    $('#agreeTerms').change(function() {
        $('#acceptTerms').prop('disabled', !$(this).is(':checked'));
    });

    // เมื่อกด "ดำเนินการต่อ" ซ่อน Modal และแสดงฟอร์ม
    $('#acceptTerms').click(function() {
        $('#termsModal').modal('hide');
        $('#registrationContainer').fadeIn();
    });
});
JS;
$this->registerJs($script);
?>