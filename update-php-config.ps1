# PowerShell Script to Update PHP Configuration
# **IMPORTANT**: This script must be run as Administrator
#
# Instructions:
# 1. Right-click on PowerShell
# 2. Select "Run as Administrator"
# 3. Navigate to this directory: cd "E:\BMS\NGO-CDDF"
# 4. Run this script: .\update-php-config.ps1

Write-Host "=" -ForegroundColor Cyan
Write-Host "PHP Configuration Update Script" -ForegroundColor Cyan
Write-Host "=================================" -ForegroundColor Cyan
Write-Host ""

# Check if running as Administrator
$isAdmin = ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator)

if (-not $isAdmin) {
    Write-Host "ERROR: This script must be run as Administrator!" -ForegroundColor Red
    Write-Host ""
    Write-Host "Please:" -ForegroundColor Yellow
    Write-Host "1. Right-click on PowerShell" -ForegroundColor Yellow
    Write-Host "2. Select 'Run as Administrator'" -ForegroundColor Yellow
    Write-Host "3. Navigate to: cd 'E:\BMS\NGO-CDDF'" -ForegroundColor Yellow
    Write-Host "4. Run: .\update-php-config.ps1" -ForegroundColor Yellow
    Write-Host ""
    pause
    exit 1
}

$phpIniPath = "C:\Program Files\php-8.5.2\php.ini"

if (-not (Test-Path $phpIniPath)) {
    Write-Host "ERROR: php.ini file not found at: $phpIniPath" -ForegroundColor Red
    Write-Host ""
    Write-Host "Please update the `$phpIniPath variable in this script with the correct path." -ForegroundColor Yellow
    Write-Host "Run 'php --ini' to find your php.ini location." -ForegroundColor Yellow
    Write-Host ""
    pause
    exit 1
}

Write-Host "Found php.ini at: $phpIniPath" -ForegroundColor Green
Write-Host ""

# Backup the original php.ini
$backupPath = "$phpIniPath.backup-$(Get-Date -Format 'yyyyMMdd-HHmmss')"
Write-Host "Creating backup: $backupPath" -ForegroundColor Yellow
Copy-Item $phpIniPath $backupPath

# Read the content
$content = Get-Content $phpIniPath

# Update the values
Write-Host "Updating PHP configuration..." -ForegroundColor Yellow
$content = $content -replace '^upload_max_filesize = 2M', 'upload_max_filesize = 10M'
$content = $content -replace '^post_max_size = 8M', 'post_max_size = 50M'
$content = $content -replace '^memory_limit = 128M', 'memory_limit = 256M'

# Save the updated content
$content | Set-Content $phpIniPath

Write-Host ""
Write-Host "SUCCESS! PHP configuration updated:" -ForegroundColor Green
Write-Host "  upload_max_filesize: 2M  -> 10M" -ForegroundColor Green
Write-Host "  post_max_size:       8M  -> 50M" -ForegroundColor Green
Write-Host "  memory_limit:        128M -> 256M" -ForegroundColor Green
Write-Host ""
Write-Host "Backup saved to: $backupPath" -ForegroundColor Cyan
Write-Host ""
Write-Host "IMPORTANT: You must restart your web server / PHP process for changes to take effect!" -ForegroundColor Yellow
Write-Host ""
Write-Host "If using 'php artisan serve':" -ForegroundColor Cyan
Write-Host "  1. Stop the server (Ctrl+C)" -ForegroundColor Cyan
Write-Host "  2. Start it again: php artisan serve" -ForegroundColor Cyan
Write-Host ""
pause
