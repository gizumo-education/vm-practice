<script>
    setTimeout("location.reload()", 7000);
</script>

<?php

$reqKeys = ['PHP_VERSION', 'SERVER_SOFTWARE', 'HTTP_HOST', 'SERVER_PORT', 'DOCUMENT_ROOT', 'SCRIPT_FILENAME'];

$reqVals = [
    'PHP_VERSION' => '/^7.2.\d+/',
    'HTTP_HOST' => '/localhost:8383/',
    'SERVER_SOFTWARE' => '/nginx/i',
    'postgres' => '/11.\d+/'
];

$getJudgement = function ($bool, $word = '') {
    return ($bool ? '<span style="color:green;">' : '<span style="color:red;">')
        . ($word ?: ($bool ? 'OK' : 'NG')) . '</span>';
};

$checkResult = function ($key, $haystack) use ($reqVals) {
    return !!preg_match($reqVals[$key], $haystack);
};

$checkPdo = function ($host) use ($checkResult, $getJudgement) {
    $user = "giztech";
    $pass = "gizumo";
    $dbname = "project2";
    $dsn = "pgsql:dbname=$dbname;host=$host";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $version = $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
        return $host . ' ' . $getJudgement($checkResult($host, $version), $version);
    } catch (PDOException $e) {
        echoPre("$host ▶ {$e->getMessage()}");
        return false;
    }
};


foreach ($reqKeys as $reqKey) {
    $val = $_SERVER[$reqKey];
    if ($reqKey === 'PHP_VERSION' && !$val) {
        $val = PHP_VERSION;
    }
    $str = $reqKey . ': ' . $val;
    if ($reqVals[$reqKey]) {
        $str .= ' ▶ level 1 judgement: ' . $getJudgement($checkResult($reqKey, $val));
    }
    echoPre($str);
}

$db = $checkPdo('postgres') ?: false;
echoPre('DB_CONNECTION ▶ level 2 judgement: ' . $getJudgement($db));
echoPre('DB_SERVER_VERSION: ' . $db);


function echoPre($content)
{
    echo '<pre>';
    print_r($content);
    echo '</pre>';
}
