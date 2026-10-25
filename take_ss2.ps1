$chrome = "C:\Program Files\Google\Chrome\Application\chrome.exe"
$tmpDir = Join-Path $env:TEMP "chrome_p7_$(Get-Random)"
$base   = "D:\laragon\laragon-6.0-minimal\www\daffa-service\daffa-service"

Write-Host "Shooting pages..."

# List data
Start-Process $chrome -ArgumentList "--headless","--disable-gpu","--window-size=1280,850","--user-data-dir=`"$tmpDir`"","--screenshot=`"$base\ss_list.png`"","http://127.0.0.1:8000/pelanggan" -Wait
Write-Host "ss_list done"

# Create form (kosong)
Start-Process $chrome -ArgumentList "--headless","--disable-gpu","--window-size=1280,850","--user-data-dir=`"$tmpDir`"","--screenshot=`"$base\ss_create.png`"","http://127.0.0.1:8000/pelanggan/create" -Wait
Write-Host "ss_create done"

# Edit form
Start-Process $chrome -ArgumentList "--headless","--disable-gpu","--window-size=1280,850","--user-data-dir=`"$tmpDir`"","--screenshot=`"$base\ss_edit.png`"","http://127.0.0.1:8000/pelanggan/1/edit" -Wait
Write-Host "ss_edit done"

Get-ChildItem "$base\ss_*.png" | Select-Object Name, Length
Remove-Item -Recurse -Force $tmpDir -ErrorAction SilentlyContinue
