$chrome = "C:\Program Files\Google\Chrome\Application\chrome.exe"
$tmpDir = Join-Path $env:TEMP "chrome_render_board_$(Get-Random)"
$htmlPath = Join-Path $PSScriptRoot "tldraw_submission.html"
$fileUri = "file:///" + $htmlPath.Replace("\", "/")
$outPng = Join-Path $PSScriptRoot "tldraw_tugas_pertemuan_6.png"

Write-Host "Rendering $fileUri to $outPng..."
$p = Start-Process -FilePath $chrome -ArgumentList "--headless", "--disable-gpu", "--hide-scrollbars", "--window-size=1920,1380", "--user-data-dir=`"$tmpDir`"", "--screenshot=`"$outPng`"", $fileUri -PassThru -Wait
Write-Host "Render exit code: $($p.ExitCode)"
Write-Host "Result file exists: $(Test-Path $outPng)"
if (Test-Path $outPng) {
    $item = Get-Item $outPng
    Write-Host "File size: $($item.Length) bytes"
}

Remove-Item -Recurse -Force $tmpDir -ErrorAction SilentlyContinue
