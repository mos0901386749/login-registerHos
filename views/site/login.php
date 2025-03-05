<?php
use yii\helpers\Html;

$this->registerCssFile(Yii::$app->request->baseUrl . '/css/login.css', ['depends' => [yii\bootstrap5\BootstrapAsset::class]]);


$this->title = 'ลงทะเบียน';
?>

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <!-- ขั้นตอนสมัครสมาชิก -->
            <div class="col-lg-6 col-md-12 left-panel text-white d-none d-lg-block">
                <h2 class="text-center fw-bold">ขั้นตอน</h2>
                <p class="text-center fs-5">
                    ขั้นตอนการลงทะเบียนเข้าใช้งาน<br>อินเทอร์เน็ตโรงพยาบาลสมเด็จพระสังฆราชองค์ที่ 17
                </p>
                <ol class="custom-list">
                    <li>คลิก "สมัครและใช้งาน Internet โรงพยาบาล ผ่านProviderID"</li>
                    <li>ระบบจะทำการสมัครสมาชิกให้อัตโนมัติขึ้น "สมัครสมาชิกเสร็จสิ้น"</li>
                    <li>เข้าใช้งานระบบอินเตอร์เน็ตด้วย ProviderID ที่ผูกไว้กับทางระบบ</li>
                    <li>สร้างบัญชีผู้ใช้งานเพื่อออกใบรับรองแพทย์อิเล็กทรอนิกส์ "สำเร็จ"</li>
                </ol>
            </div>

            <!-- Card Login -->
            <div class="col-lg-6 col-md-12 d-flex justify-content-center">
                <div class="card w-100">
                    <div class="text-center right-panel">
                        <img src="https://uat-provider.id.th/assets/Plogo-f6506bc1.png" width="70%" alt="Provider ID">
                        <h3 class="text-danger mt-3">ระบบเข้าใช้งาน Internet โรงพยาบาลสมเด็จพระสังฆราช องค์ที่ 17</h3>
                    </div>
                    <button class="btn login-btn mt-3" data-bs-toggle="modal" data-bs-target="#registrationModal">สมัครและใช้งาน Internet โรงพยาบาล ผ่านProviderID</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">ตรวจสอบข้อมูลก่อนลงทะเบียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ol class="custom-list">
                        <li>ท่านได้ลงทะเบียน HealthID ณ จุดบริการ หรือมีแอพพลิเคชั่น ThaiD และได้รับ PIN Code แล้ว</li>
                        <li>หน่วยงานภาครัฐ โปรดตรวจสอบกับเจ้าหน้าที่ HR ประจำสถานบริการ Upload ข้อมูลบุคลากรเข้าระบบ MOPH-IDP แล้ว</li>
                        <li>หน่วยงานภาคเอกชน โปรดติดต่อ สสจ. ในจังหวัดของท่าน เพื่อ Upload ข้อมูล บุคลากรประจำหน่วยงานของท่าน เข้าไปใน ProviderID Portal</li>
                    </ol>
                    <div class="checkbox-label">
                        <input type="checkbox" id="agreeCheckbox">
                        <label for="agreeCheckbox">ตรวจสอบข้อมูลเรียบร้อยแล้ว พร้อมสำหรับการลงทะเบียน</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-primary" id="confirmButton" disabled>ตกลง</button>
                </div>
            </div>
        </div>
    </div>

    <img src="https://upload.wikimedia.org/wikipedia/commons/8/8f/Example_image.svg" class="footer-icon" alt="Icon">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ตรวจสอบว่าหน้านี้ถูกโหลดมาแล้วหรือไม่
        if (sessionStorage.getItem('visited')) {
            // ถ้าเคยโหลดมาแล้ว ให้รีเฟรชหน้า
            sessionStorage.removeItem('visited'); // ลบค่าเพื่อป้องกันการรีเฟรชซ้ำ
            window.location.reload();
        } else {
            // ถ้ายังไม่เคยโหลด ให้ตั้งค่าสถานะว่าโหลดแล้ว
            sessionStorage.setItem('visited', 'true');
        }

        document.getElementById('agreeCheckbox').addEventListener('change', function() {
            document.getElementById('confirmButton').disabled = !this.checked;
        });

        document.getElementById('confirmButton').addEventListener('click', function() {
            window.location.href = "https://uat-moph.id.th/login";
        });
    </script>
