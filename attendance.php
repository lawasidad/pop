<?php
// ناوی فایلی داتاکان
$dataFile = 'attendance.json';

// وەرگرتنی داتا لە POST
$name = $_POST['name'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';
$selfie = $_POST['selfie'] ?? '';
$location = $_POST['location'] ?? '';
$type = $_POST['type'] ?? ''; // IN یان OUT

// ڕەخنەکان: پێویستە ناو و جۆر دروست بێت
if (empty($name) || empty($type) || empty($time)) {
    http_response_code(400);
    echo json_encode(["error" => "Name, type and time are required"]);
    exit;
}

// خوندن یان دروستکردنی فایلی داتا
$logs = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

// دروستکردنی تۆماری نوێ بۆ IN
$newEntry = [
    "name" => $name,
    "date" => $date,
    "in" => "",
    "out" => "",
    "selfieIn" => "",
    "selfieOut" => "",
    "locationIn" => "",
    "locationOut" => ""
];

if ($type === "IN") {
    $newEntry['in'] = $time;
    $newEntry['selfieIn'] = $selfie;
    $newEntry['locationIn'] = $location;
    $logs[] = $newEntry;
} elseif ($type === "OUT") {
    // نوێکردنەوەی ئەو تۆمارەی کە IN بووە و تاکو ئێستا OUT نییە
    for ($i = count($logs) - 1; $i >= 0; $i--) {
        if ($logs[$i]['name'] === $name && empty($logs[$i]['out'])) {
            $logs[$i]['out'] = $time;
            $logs[$i]['selfieOut'] = $selfie;
            $logs[$i]['locationOut'] = $location;
            break;
        }
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Type must be IN or OUT"]);
    exit;
}

// نووسینی داتاکان بۆ فایل
file_put_contents($dataFile, json_encode($logs, JSON_PRETTY_PRINT));

// وەڵام بۆ JavaScript یان فۆرماکان
echo json_encode(["success" => true, "message" => "Attendance saved"]);
