$chrome = "C:\Program Files\Google\Chrome\Application\chrome.exe"
$tmpDir = Join-Path $env:TEMP "chrome_test_profile_$(Get-Random)"
$adminImg = Join-Path $PSScriptRoot "screenshot_admin.png"
$guestImg = Join-Path $PSScriptRoot "screenshot_guest.png"

Write-Host "Temp dir: $tmpDir"
Write-Host "Taking Admin screenshot..."
$p1 = Start-Process -FilePath $chrome -ArgumentList "--headless", "--disable-gpu", "--hide-scrollbars", "--window-size=1280,850", "--user-data-dir=`"$tmpDir`"", "--screenshot=`"$adminImg`"", "http://127.0.0.1:8000/pelanggan" -PassThru -Wait
Write-Host "Admin process exit code: $($p1.ExitCode)"

Write-Host "Taking Guest screenshot..."
$p2 = Start-Process -FilePath $chrome -ArgumentList "--headless", "--disable-gpu", "--hide-scrollbars", "--window-size=1280,850", "--user-data-dir=`"$tmpDir`"", "--screenshot=`"$guestImg`"", "http://127.0.0.1:8000/" -PassThru -Wait
Write-Host "Guest process exit code: $($p2.ExitCode)"

Write-Host "Admin screenshot exists: $(Test-Path $adminImg)"
Write-Host "Guest screenshot exists: $(Test-Path $guestImg)"

Remove-Item -Recurse -Force $tmpDir -ErrorAction SilentlyContinue
