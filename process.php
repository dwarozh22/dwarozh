<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = htmlspecialchars(trim($_POST["name"]));
    $mobile = htmlspecialchars(trim($_POST["mobile"]));
    $dob    = htmlspecialchars(trim($_POST["dob"]));
    $school = htmlspecialchars(trim($_POST["school"]));

    // Telegram Bot Token و Chat ID
    $botToken = "8193213148:AAFpzgPMPWCUThVUDt1jp7tfaSZkB4n-2W8"; // نمونە: 123456789:ABCdefGh...
    $chatId   = "@dwarozhdps"; // نمونە: 123456789 یان -100...

    // پەیامی نێردن
    $message = "📥 زانیاری قوتابی نوێ:\n";
    $message .= "👤 ناو: $name\n";
    $message .= "📱 مۆبایل: $mobile\n";
    $message .= "🎂 لەدایکبوون: $dob\n";
    $message .= "🏫 قوتابخانە: $school";

    // ناردنی پەیام بۆ Telegram
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    
    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    $options = [
        "http" => [
            "method" => "POST",
            "header" => "Content-Type:application/x-www-form-urlencoded\r\n",
            "content" => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result) {
        echo "✅ زانیاری نێردرا بۆ Telegram!";
    } else {
        echo "❌ هەڵەیەک ڕویدا لە ناردن.";
    }
}
?>
