<?php


function rootPath(?string $path = ''): string
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];

    return $protocol . '://' . $host . $path;
}

function documentRoot(string $filename = "")
{

    $completePath =  dirname(__DIR__, 1)  . "/$filename";
    return $completePath;
}

function asset(string $asset)
{
    echo rootPath("/assets/$asset");
}

function goToPage(string $page)
{
    include_once "../app/resources/pages/" . $page . ".php";
}
