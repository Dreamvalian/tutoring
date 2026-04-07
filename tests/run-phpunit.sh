#!/bin/bash

# PHPUnit Test Runner for Bimbel Application
# Usage: ./tests/run-phpunit.sh [options]

echo "========================================"
echo "  BIMBEL APPLICATION - PHPUNIT TEST"
echo "========================================"
echo ""

# Check if phpunit is available
if ! command -v ./vendor/bin/phpunit &> /dev/null; then
    echo "PHPUnit not found. Installing dependencies..."
    composer install --dev
fi

# Default configuration
PHPUNIT="./vendor/bin/phpunit"
CONFIG="./phpunit.xml.dist"

# Run based on arguments
case "${1:-all}" in
    models)
        echo "Running Model Tests..."
        $PHPUNIT --configuration $CONFIG --testsuite models
        ;;
    controllers)
        echo "Running Controller Tests..."
        $PHPUNIT --configuration $CONFIG --testsuite controllers
        ;;
    integration)
        echo "Running Integration Tests..."
        $PHPUNIT --configuration $CONFIG --testsuite integration
        ;;
    all|*)
        echo "Running All Tests..."
        $PHPUNIT --configuration $CONFIG
        ;;
esac

EXIT_CODE=$?

echo ""
echo "========================================"
if [ $EXIT_CODE -eq 0 ]; then
    echo "  ✓ ALL TESTS PASSED"
else
    echo "  ✗ SOME TESTS FAILED"
fi
echo "========================================"

exit $EXIT_CODE
