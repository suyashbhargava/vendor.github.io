<!-- use Google\Cloud\Translate\V2\TranslateClient;

function translateText($text, $targetLanguage)
{
    $projectId = 'YOUR_PROJECT_ID'; // Replace with your actual Google Cloud project ID
    $apiKey = 'YOUR_API_KEY'; // Replace with your actual API key
    
    $translate = new TranslateClient([
        'projectId' => $projectId,
        'key' => $apiKey
    ]);
    
    $translation = $translate->translate($text, ['target' => $targetLanguage]);
    
    return $translation['text'];
}

$htmlContent = file_get_contents('booking.php');

$doc = new DOMDocument();
$doc->loadHTML($htmlContent);

$xpath = new DOMXPath($doc);
$elements = $xpath->query("//*[not(self::script or self::style)]/text()");

foreach ($elements as $element) {
    $originalText = $element->textContent;
    $translatedText = translateText($originalText, 'hi'); // 'hi' represents Hindi
    
    $element->nodeValue = $translatedText;
}

$translatedHTML = $doc->saveHTML(); -->