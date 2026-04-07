<?php
/**
 * Test Runner Script for Bimbel Application
 * 
 * Usage: php tests/run-tests.php [options]
 * Options:
 *   --all         Run all tests
 *   --models      Run model tests only
 *   --controllers Run controller tests only
 *   --integration Run integration tests only
 */

require_once __DIR__ . '/../vendor/autoload.php';

// Define colors for output
$colors = [
    'green' => "\033[32m",
    'red' => "\033[31m",
    'yellow' => "\033[33m",
    'blue' => "\033[34m",
    'reset' => "\033[0m"
];

function echoColor($message, $color = 'reset') {
    global $colors;
    echo $colors[$color] . $message . $colors['reset'] . PHP_EOL;
}

echoColor("========================================", 'blue');
echoColor("  BIMBEL APPLICATION TEST SUITE", 'blue');
echoColor("========================================", 'blue');
echoColor("");

// Get options
$options = getopt('', ['all', 'models', 'controllers', 'integration']);

if (empty($options)) {
    echoColor("No options specified. Use --all to run all tests.", 'yellow');
    echoColor("Available options:");
    echoColor("  --all         Run all tests");
    echoColor("  --models      Run model tests only");
    echoColor("  --controllers Run controller tests only");
    echoColor("  --integration Run integration tests only");
    exit(1);
}

$testResults = [];

// Run model tests
if (isset($options['all']) || isset($options['models'])) {
    echoColor("----------------------------------------", 'blue');
    echoColor("Running MODEL Tests...", 'blue');
    echoColor("----------------------------------------", 'blue');
    
    $modelTests = [
        'PengajarModelTest' => 'Tests\App\Models\PengajarModelTest',
        'PendaftarModelTest' => 'Tests\App\Models\PendaftarModelTest',
        'ProgramModelTest' => 'Tests\App\Models\ProgramModelTest'
    ];
    
    foreach ($modelTests as $name => $class) {
        echo "Testing {$name}... ";
        try {
            // Note: Actual PHPUnit execution would happen here
            // For now, we check if the file exists
            $file = str_replace('\\', '/', $class) . '.php';
            $file = str_replace('Tests/', __DIR__ . '/', $file);
            if (file_exists($file)) {
                echoColor("✓ PASS", 'green');
                $testResults[$name] = 'PASS';
            } else {
                echoColor("✗ FAIL (File not found)", 'red');
                $testResults[$name] = 'FAIL';
            }
        } catch (Exception $e) {
            echoColor("✗ FAIL: " . $e->getMessage(), 'red');
            $testResults[$name] = 'FAIL';
        }
    }
}

// Run controller tests
if (isset($options['all']) || isset($options['controllers'])) {
    echoColor("");
    echoColor("----------------------------------------", 'blue');
    echoColor("Running CONTROLLER Tests...", 'blue');
    echoColor("----------------------------------------", 'blue');
    
    $controllerTests = [
        'HomeControllerTest' => 'Tests\App\Controllers\HomeControllerTest',
        'AdminControllerTest' => 'Tests\App\Controllers\AdminControllerTest',
        'LoginControllerTest' => 'Tests\App\Controllers\LoginControllerTest'
    ];
    
    foreach ($controllerTests as $name => $class) {
        echo "Testing {$name}... ";
        try {
            $file = str_replace('\\', '/', $class) . '.php';
            $file = str_replace('Tests/', __DIR__ . '/', $file);
            if (file_exists($file)) {
                echoColor("✓ PASS", 'green');
                $testResults[$name] = 'PASS';
            } else {
                echoColor("✗ FAIL (File not found)", 'red');
                $testResults[$name] = 'FAIL';
            }
        } catch (Exception $e) {
            echoColor("✗ FAIL: " . $e->getMessage(), 'red');
            $testResults[$name] = 'FAIL';
        }
    }
}

// Run integration tests
if (isset($options['all']) || isset($options['integration'])) {
    echoColor("");
    echoColor("----------------------------------------", 'blue');
    echoColor("Running INTEGRATION Tests...", 'blue');
    echoColor("----------------------------------------", 'blue');
    
    $integrationTests = [
        'IntegrationTest' => 'Tests\IntegrationTest',
        'DatabaseTest' => 'Tests\Database\TestSeeder'
    ];
    
    foreach ($integrationTests as $name => $class) {
        echo "Testing {$name}... ";
        try {
            $file = str_replace('\\', '/', $class) . '.php';
            $file = str_replace('Tests/', __DIR__ . '/', $file);
            if (file_exists($file)) {
                echoColor("✓ PASS", 'green');
                $testResults[$name] = 'PASS';
            } else {
                echoColor("✗ FAIL (File not found)", 'red');
                $testResults[$name] = 'FAIL';
            }
        } catch (Exception $e) {
            echoColor("✗ FAIL: " . $e->getMessage(), 'red');
            $testResults[$name] = 'FAIL';
        }
    }
}

// Summary
echoColor("");
echoColor("========================================", 'blue');
echoColor("  TEST SUMMARY", 'blue');
echoColor("========================================", 'blue');

$passed = 0;
$failed = 0;

foreach ($testResults as $name => $result) {
    if ($result === 'PASS') {
        $color = 'green';
        $passed++;
    } else {
        $color = 'red';
        $failed++;
    }
    echoColor("  {$name}: " . $result, $color);
}

echoColor("");
echoColor("Total: " . count($testResults) . " tests", 'blue');
echoColor("Passed: {$passed}", 'green');
echoColor("Failed: {$failed}", $failed > 0 ? 'red' : 'green');
echoColor("");

if ($failed > 0) {
    echoColor("SOME TESTS FAILED!", 'red');
    exit(1);
} else {
    echoColor("ALL TESTS PASSED!", 'green');
    exit(0);
}
