<?php
require __DIR__ . '/vendor/autoload.php';

use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

$file = dirname(__DIR__) . '/index.html';
$html = file_get_contents($file);
$lead = substr($html, 0, strpos($html, '<div class="container">'));
$tail = substr($html, strpos($html, '</footer>') + 9);
$html = $lead . file_get_contents(__DIR__ . '/front.html') . $tail;


$environment = new Environment();
$environment->addExtension(new CommonMarkCoreExtension());
$converter = new MarkdownConverter($environment);

$examples = $converter->convert(
	file_get_contents(__DIR__ . '/front.md'),
);

$html = str_replace(
	'{{FRONT}}',
	$examples,
	$html
);

file_put_contents($file, $html);
