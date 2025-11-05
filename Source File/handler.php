<?php

session_start();
require_once __DIR__ . '/config.php'; // must define $conn = new mysqli(...)

$email      = 'admin@email.com';
$name       = 'Admin';
$user_type  = 'handler';
$plain_pass = 'Admin123@';

// 1) Does a handler with this email already exist?
$check = $conn->prepare("SELECT id FROM users WHERE email = ? AND user_type = ?");
$check->bind_param('ss', $email, $user_type);
$check->execute();
$res = $check->get_result();
$exists = $res && $res->num_rows === 1;
$check->close();

if ($exists) {
    // 2) Update name & password (so you can reset if needed)
    $hash = password_hash($plain_pass, PASSWORD_DEFAULT);
    $upd = $conn->prepare("UPDATE users SET name = ?, password = ? WHERE email = ? AND user_type = ?");
    $upd->bind_param('ssss', $name, $hash, $email, $user_type);
    if ($upd->execute()) {
        echo "✅ Updated existing handler user: {$email}";
    } else {
        echo "❌ Update failed: " . htmlspecialchars($upd->error);
    }
    $upd->close();
} else {
    // 3) Insert fresh user
    $hash = password_hash($plain_pass, PASSWORD_DEFAULT);
    $ins = $conn->prepare("INSERT INTO users (name, email, password, user_type) VALUES (?, ?, ?, ?)");
    $ins->bind_param('ssss', $name, $email, $hash, $user_type);
    if ($ins->execute()) {
        echo "✅ Created handler user: {$email}";
    } else {
        echo "❌ Insert failed: " . htmlspecialchars($ins->error);
    }
    $ins->close();
}

$conn->close();
