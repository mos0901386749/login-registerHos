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
                <h3 class="text-center">กรุณากรอกข้อมูลให้ครบถ้วน เพื่อลงทะเบียน</h3><br>
                <?php $form = ActiveForm::begin(); ?>

                <h4>ข้อมูลส่วนบุคคล</h4><br>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'prefix_th')->dropDownList(['นาย' => 'นาย', 'นาง' => 'นาง'], ['prompt' => 'เลือกคำนำหน้า']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'prefix_en')->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.'], ['prompt' => 'เลือกคำนำหน้า']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'ชื่อ']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'นามสกุล']) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'citizen_id')->textInput(['placeholder' => 'เลขบัตรประชาชน']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'birth_date')->input('date') ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'email')->input('email', ['placeholder' => 'อีเมล']) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'phone')->textInput(['placeholder' => 'เบอร์โทร']) ?>
                    </div>
                </div>

                <br>
                <h4>ข้อมูลสังกัด</h4>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'affiliation')->textInput(['affiliation' => 'ตำแหน่ง/วิชาชีพ']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'position')->textInput(['position' => 'ตำแหน่ง/วิชาชีพ']) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'type')->textInput(['type' => 'ประเภท']) ?>
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

