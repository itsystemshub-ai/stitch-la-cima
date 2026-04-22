$rootDir = "c:\Users\ET\Documents\GitHub\stitch_la_cima\stitch_la_cima_repuestos"
$stopWords = "de", "la", "y", "el", "los", "las", "un", "una", "en", "a", "erp", "industrial", "forge", "la-cima", "cima", "ca"

function Get-Slug {
    param($text)
    $text = $text.ToLower()
    $text = $text -replace '[áàâãä]', 'a'
    $text = $text -replace '[éèêë]', 'e'
    $text = $text -replace '[íìîï]', 'i'
    $text = $text -replace '[óòôõö]', 'o'
    $text = $text -replace '[úùûü]', 'u'
    $text = $text -replace 'ñ', 'n'
    $text = $text -replace '[^a-z0-9]+', '-'
    $text = $text.Trim('-')
    return $text
}

function Get-ShortName {
    param($slug)
    $words = $slug.Split('-')
    $filtered = $words | Where-Object { $stopWords -notcontains $_ }
    
    # Take first 3 words
    if ($filtered.Count -gt 3) {
        $short = $filtered[0..2] -join '-'
    } else {
        $short = $filtered -join '-'
    }
    
    if (-not $short) { $short = "page" }
    return "$short.html"
}

Get-ChildItem -Path $rootDir -Directory | ForEach-Object {
    $folder = $_
    $codePath = Join-Path $folder.FullName "code.html"
    
    if (Test-Path $codePath) {
        $slug = Get-Slug $folder.Name
        $newName = Get-ShortName $slug
        $newPath = Join-Path $folder.FullName $newName
        
        Write-Host "Renaming $($codePath) to $($newPath)"
        Move-Item -Path $codePath -Destination $newPath -Force
    }
}
