@echo off
chcp 65001 >nul
cls

echo ========================================
echo   BIMBEL APPLICATION - PHPUNIT TEST
echo ========================================
echo.

set PHPUNIT=vendor\bin\phpunit
set CONFIG=phpunit.xml.dist

if not exist %PHPUNIT% (
    echo PHPUnit not found. Installing dependencies...
    composer install --dev
)

if "%~1"=="models" (
    echo Running Model Tests...
    %PHPUNIT% --configuration %CONFIG% --testsuite models
    goto :end
)

if "%~1"=="controllers" (
    echo Running Controller Tests...
    %PHPUNIT% --configuration %CONFIG% --testsuite controllers
    goto :end
)

if "%~1"=="integration" (
    echo Running Integration Tests...
    %PHPUNIT% --configuration %CONFIG% --testsuite integration
    goto :end
)

echo Running All Tests...
%PHPUNIT% --configuration %CONFIG%

:end
set EXIT_CODE=%ERRORLEVEL%

echo.
echo ========================================
if %EXIT_CODE%==0 (
    echo   ✓ ALL TESTS PASSED
) else (
    echo   ✗ SOME TESTS FAILED
)
echo ========================================

exit /b %EXIT_CODE%
