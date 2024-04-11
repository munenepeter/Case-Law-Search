<?php include_once 'base.view.php';?>

<section>

Welcome to law search

<br>

<input type="search" name="q" id="query">

<br>

<button type="submit">Search</button>
</section>



<?php

$path = APP_ROOT . 'static/docs/acts.html';

function parseActsFromHtml(string $html): array {

    $acts = [];

    // Use DOMDocument for parsing the HTML
    $dom = new DOMDocument();
    $dom->loadHTML($html);

    // Find all elements with class "act-title"
    $actTitles = $dom->getElementsByTagName('div');
    foreach ($actTitles as $actTitle) {
        if ($actTitle->getAttribute('class') === 'act-title') {
            // Find the anchor tag (a) within the act-title div
            $anchor = $actTitle->getElementsByTagName('a')->item(0);
            if ($anchor) {
                $acts[] = [
                    'title' => trim(strip_tags($actTitle->textContent)), // Extract title text
                    'href' => "http://kenyalaw.org:8181/exist/kenyalex/".$anchor->getAttribute('href'), // Extract link (href)
                ];
            }
        }
    }

    return $acts;
}

// Example usage
$html = file_get_contents($path);

$acts = parseActsFromHtml($html);

if (!empty($acts)) {
    foreach ($acts as $act) {
        echo trim($act['title']) . ", Link: " . $act['href'] . "<br/> <br/>";
    }
} else {
    echo "No acts found in the provided HTML.";
}

// http://kenyalaw.org:8181/exist/kenyalex/index.xql
// actview.xql?actid=CAP.%20361