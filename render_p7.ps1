$chrome = "C:\Program Files\Google\Chrome\Application\chrome.exe"
$tmpDir = Join-Path $env:TEMP "chrome_p7_$(Get-Random)"
$base   = "D:\laragon\laragon-6.0-minimal\www\daffa-service\daffa-service"
$htmlUri = "file:///$base/submission_p7.html".Replace("\","/")
$outPng  = "$base\tugas_pertemuan_7_daffa_service.png"

Write-Host "Rendering full submission image..."
Start-Process $chrome -ArgumentList "--headless","--disable-gpu","--hide-scrollbars","--window-size=1920,2400","--user-data-dir=`"$tmpDir`"","--screenshot=`"$outPng`"",$htmlUri -Wait
Write-Host "Done. Size: $((Get-Item $outPng).Length) bytes"
Remove-Item -Recurse -Force $tmpDir -ErrorAction SilentlyContinue
