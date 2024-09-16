<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>post a job</title>
  <!-- إضافة Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
.form-container {
    background-color: #f8f9faec; /* لون الخلفية */
    padding: 18px; /* المسافة الداخلية */
    border-radius: 27px; /* زوايا مدورة */
    box-shadow: 0 4px 8px rgba(20, 20, 20, 0.459); /* ظل بسيط */
    max-width: 950px; /* تحديد أقصى عرض */
    margin: 115px auto; /* توسيط الفورم وتوفير مساحة خارجية */
}

h2 {
    font-size: 1.5rem; /* تصغير حجم العنوان */
    text-align: center; /* توسيط العنوان */
}

.btn {
    /* إزالة عرض ثابت للأزرار */
    margin-top: 10px; /* توفير مسافة أعلى الأزرار */
    /* إزالة الهوامش الجانبية */
}

.form-group label {
    font-weight: bold; /* جعل النص عريض */
}

.form-group input {
    font-size: 0.9rem; /* تصغير حجم النص داخل الحقول */
}

.image-preview img {
    max-width: 150px; /* تحديد أقصى عرض لصورة المعاينة */
    border-radius: 5px; /* زوايا مدورة لصورة المعاينة */
}

.custom-radio-group {
    display: flex;
    flex-direction: column;
}

.custom-radio {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.button{
    margin-left: 20px; 
}

.custom-radio-input {
    appearance: none;
    border: 2px solid #ccc;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    cursor: pointer;
    transition: border-color 0.2s ease, background-color 0.2s ease;
    margin-right: 10px;
}

.custom-radio-input:checked {
    border-color: #007bff;
    background-color: #007bff;
}

.custom-radio-label {
    font-size: 1rem;
    color: #333;
    cursor: pointer;
}

.custom-radio-input:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25); /* تحسين مظهر التركيز */
}

/* نص التسمية */
.custom-radio-label {
    font-size: 0.9rem;
}

.custom-select {
    appearance: none; /* إزالة المظهر الافتراضي */
    background-color: #fff; /* لون الخلفية */
    border: 1px solid #ced4da; /* لون الحدود */
    border-radius: 0.25rem; /* زوايا مدورة */
    padding: 0.5rem 1rem; /* مسافة داخلية */
    font-size: 1rem; /* حجم الخط */
    color: #495057; /* لون النص */
    width: 100%; /* عرض كامل */
    cursor: pointer; /* تغيير المؤشر عند المرور */
    transition: border-color 0.2s ease, box-shadow 0.2s ease; /* تأثير الانتقال */
}

.custom-select:focus {
    border-color: #007bff; /* تغيير لون الحدود عند التركيز */
    outline: none; /* إزالة الخط الخارجي */
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* تحسين مظهر التركيز */
}

/* تحسين السهم المنسدل */
.custom-select::after {
    content: '\f078'; /* رمز السهم المنسدل */
    font-family: 'Font Awesome 5 Free'; /* استخدام خط Font Awesome */
    font-weight: 900; /* وزن الخط */
    position: absolute; /* وضع السهم بشكل مطلق */
    right: 10px; /* مسافة من اليمين */
    top: 50%; /* توسيط عمودي */
    transform: translateY(-50%); /* تصحيح موضع السهم */
    pointer-events: none; /* تجاهل التفاعل مع السهم */
}

.form-container {
    max-width: 980px;
    margin: 0 auto;
    padding: 20px;
}

.question-block {
    border-left: 5px solid #007bff;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 5px;
}

.options label {
    font-weight: bold;
}

#imgPreview {
        width: 150px; /* عرض الصورة */
        height: 150px; /* ارتفاع الصورة */
        border-radius: 50%; /* يجعل الصورة مدورة */
        object-fit: cover; /* يتأكد من ملء الصورة في الشكل المدور */
    }

.btn-primary, .btn-success, .btn-danger {
    margin-top: 10px;
}

.btn-info {
    margin-top: 10px;
    color: rgb(236, 232, 232);
}

.btn-lift-up {
    margin-top: -1px; /* تعديل هذه القيمة حسب الحاجة */
}
</style>
@livewireStyles
</head>
<body>
  @livewire('create_job')
  
  @livewireScripts
  <script>
    document.getElementById('add-question-btn').addEventListener('click', function () {
        var container = document.getElementById('questions-container');
        var newQuestion = `
            <div class="form-group">
                <label for="question_text">نص السؤال</label>
                <input type="text" class="form-control" name="questions[]" required>
            </div>
            <div class="form-group">
                <label for="question_type">نوع السؤال</label>
                <select class="form-control" name="question_type[]" required>
                    <option value="text">نص</option>
                    <option value="multiple_choice">اختيار من متعدد</option>
                </select>
            </div>
            <div class="form-group">
                <button type="button" class="remove-question-btn btn btn-danger">إزالة</button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newQuestion);
    });

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-question-btn')) {
            event.target.parentElement.previousElementSibling.remove();
            event.target.parentElement.remove();
        }
    });
</script>
</body>
</html>
