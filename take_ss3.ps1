$chrome = "C:\Program Files\Google\Chrome\Application\chrome.exe"
$tmpDir = Join-Path $env:TEMP "chrome_p7b_$(Get-Random)"
$base   = "D:\laragon\laragon-6.0-minimal\www\daffa-service\daffa-service"

# Edit form (ID=3)
Start-Process $chrome -ArgumentList "--headless","--disable-gpu","--window-size=1280,850","--user-data-dir=`"$tmpDir`"","--screenshot=`"$base\ss_edit.png`"","http://127.0.0.1:8000/pelanggan/3/edit" -Wait
Write-Host "ss_edit done: $((Get-Item $base\ss_edit.png).Length) bytes"

Remove-Item -Recurse -Force $tmpDir -ErrorAction SilentlyContinue
