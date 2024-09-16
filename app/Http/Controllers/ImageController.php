<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ImageController extends Controller
{
    public function showForm(){
        return view('cv-form');
    }
    
    public function generateCV(Request $request)
    {

// البيانات الواردة من النموذج
$data = $request->all();

// إرسال skills array
if (isset($data['skills'])) {
    $data['skills'] = array_map('trim', explode(',', $data['skills']));
}

// تحويل الشهور من أرقام إلى أسماء
$convertMonthNumberToName = function ($monthNumber) {
    return Carbon::createFromFormat('!m', $monthNumber)->format('F');
};

// تحويل الشهور إذا كانت موجودة
foreach (['start_date_month', 'end_date_month', 'start_date_month2', 'end_date_month2', 'start_date_month3', 'end_date_month3', 'start_date_month_university', 'end_date_month_university'] as $field) {
    if (isset($data[$field])) {
        $monthNumber = intval($data[$field]);
        $data[$field] = $convertMonthNumberToName($monthNumber);
    }
}

// التحقق من الحقول الخاصة بـ currently_working
if (isset($data['currently_working'])) {
    $data['end_date_month'] = '';
    $data['end_date_year'] = 'present';
}

if (isset($data['currently_working_university'])) {
    $data['end_date_month_university'] = 'I am still a student';
    $data['end_date_year_university'] = '';
}

// تحقق من وجود المجلد وأنشئه إذا لزم الأمر
$pdfDirectory = storage_path('app/public/cvs');
if (!is_dir($pdfDirectory)) {
    mkdir($pdfDirectory, 0775, true);
}

// اختيار القالب المناسب بناءً على theme
$themeViews = [
    'cv1' => 'cv/cv-pdf',
    'cv2' => 'cv/cv2-pdf',
    'cv3' => 'cv/cv3-pdf',
    'cv4' => 'cv/cv4-pdf'
];  

$selectedTheme = $request->selectedTheme;
$pdfView = isset($themeViews[$selectedTheme]) ? $themeViews[$selectedTheme] : 'cv/cv-pdf';

$pdf = PDF::loadView($pdfView, $data);

// إعداد اسم الملف وتخزين PDF
$filename = 'cv_' . time() . '.pdf';
$path = 'public/cvs/' . $filename;
$pdf->save(storage_path('app/' . $path));

// إنشاء رابط PDF
$pdfUrl = Storage::url($path);

// عرض النتائج
return view('cv.cv-result', compact('pdfUrl'));

    }
}
