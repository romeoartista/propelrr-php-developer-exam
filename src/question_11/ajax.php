<?php

$track = '';
if (!$_POST) {
    $track = 'A';
    header('Content-Type: application/json; charset=utf-8');
    header('Status: 400 Bad Request');
    echo json_encode([
        'status' => '400',
        'messages' => 'Invalid values entered',
    ]);
    exit;
}

$error_validation_messages = [];

if (!$_POST['full_name']) {
    $track = $track . 'B';
    $error_validation_messages['fullNameField'] = false;
}

if (!$_POST['email']) {
    $track = $track . 'C';
    $error_validation_messages['emailField'] = false;
} else {
    $track = $track . 'D';
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $track = $track . 'E';
        $error_validation_messages['emailField'] = false;
    }
}

if (!$_POST['phone_number']) {
    $track = $track . 'F';
    $error_validation_messages['phoneNumberField'] = false;
} else {
    $track = $track . 'G';
    $phone_prefixes = ['0817', '0895', '0896', '0897', '0898', '0905', '0906', '0907', '0908', '0909', '0910', '0912', '0915', '0916', '0917', '0918', '0919', '0920', '0921', '0922', '0923', '0924', '0925', '0926', '0927', '0928', '0929', '0930', '0931', '0932',
        '0933', '0934', '0935', '0936', '0937', '0938', '0939', '0940', '0941', '0942', '0943', '0945', '0946', '0947', '0948', '0949', '0950', '0951', '0953', '0954', '0955', '0956', '0961', '0965', '0966', '0967', '0973', '0974', '0975', '0976', '0977', '0978',
        '0979', '0991', '0992', '0993', '0994', '0995', '0996', '0997', '0998', '0999'];
    $current_phone_prefix = '';

    foreach ($phone_prefixes as $phone_prefix) {
        if (str_starts_with($_POST['phone_number'], $phone_prefix)) {
            $track = $track . 'H';
            $current_phone_prefix = $phone_prefix;
            break;
        }
    }

    $prefixless_phone_number = '';

    if (!$current_phone_prefix) {
        $track = $track . 'I';
        $error_validation_messages['phoneNumberField'] = false;
    } else {
        $track = $track . 'J';
        $prefixless_phone_number = substr($_POST['phone_number'], strlen($current_phone_prefix), strlen($_POST['phone_number']) - strlen($current_phone_prefix));

        if (!preg_match('/\d{7}/', $prefixless_phone_number)) {
            $track = $track . 'K';
            $error_validation_messages['phoneNumberField'] = false;
        }
    }
}

$timestamp_diff = 0;

if (!$_POST['birth_date']) {
    $track = $track . 'K';
    $error_validation_messages['birthDateField'] = false;
} else {
    $track = $track . 'L';
    $birth_date = DateTime::createFromFormat('Y-m-d', $_POST['birth_date']);

    if ($birth_date && $birth_date->format('Y-m-d') === $_POST['birth_date']) {
        $track = $track . 'M';
        $timestamp_diff = time() - strtotime($_POST['birth_date']);
        $timestamp_diff = $timestamp_diff / 86400;
        $timestamp_diff = floor($timestamp_diff / 365);
    } else {
        $track = $track . 'N';
        $error_validation_messages['birthDateField'] = false;
    }
}

if (!$_POST['age']) {
    $track = $track . 'O';
    $error_validation_messages['ageField'] = false;
} else {
    $track = $track . 'P';
    if ($timestamp_diff != $_POST['age']) {
        $track = $track . 'Q';
        $error_validation_messages['ageField'] = false;
    }
}

if (!$_POST['gender']) {
    $track = $track . 'R';
    $error_validation_messages['genderField'] = false;
}

if ($error_validation_messages) {
    $track = $track . 'S';
    header('Content-Type: application/json; charset=utf-8');
    header('Status: 400 Bad Request');
    echo json_encode([
        'status' => '400',
        'messages' => 'Invalid values entered',
        'validation_errors' => $error_validation_messages
    ]);
    exit;
}

$db_host = 'db';
$username = 'root';
$password = 'root';
$db = 'profiles_db';
$options = [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
];

$connection = new PDO('mysql:host=' . $db_host . ';dbname=' . $db, $username, $password, $options);
$connection->beginTransaction();

try {
    $track = $track . 'T';
    $statement = $connection->prepare('INSERT INTO profile (full_name, email, phone_number, birth_date, age, gender) VALUES (:full_name, :email, :phone_number, :birth_date, :age, :gender)');
    $statement->execute($_POST);
    $connection->commit();

    header('Content-Type: application/json; charset=utf-8');
    header('Status: 400 Bad Request');
    echo json_encode([
        'status' => '200',
        'messages' => 'Profile data created',
    ]);
    exit;
} catch (\Exception $e) {
    $track = $track . 'U';
    $connection->rollBack();
    header('Content-Type: application/json; charset=utf-8');
    header('Status: 500 Internal Server Error');
    echo json_encode([
        'status' => '500',
        'messages' => $e->getMessage(),
    ]);
    exit;
}
