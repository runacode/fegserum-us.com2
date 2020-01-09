<?php
include_once('pixelconstants.php');

//pixel code
function extract_subdomains($domain)
{
    $subdomains = $domain;
    $domain = extract_domain($subdomains);

    $subdomains = rtrim(strstr($subdomains, $domain, true), '.');

    return $subdomains;
}

function extract_domain($domain)
{
    if (preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches)) {
        return $matches['domain'];
    } else {
        return $domain;
    }
}

$currentsubdomain = extract_subdomains($_SERVER['HTTP_HOST']);
$currentdomain = extract_domain($_SERVER['HTTP_HOST']);

if(!isset($PixelPage)){
    $PixelPage = $PixelUrl;
}



?>


<iframe sandbox="allow-scripts allow-same-origin   " src="" id="PixelFrame" width="1px"
        height="1px" style="display:none" referrerpolicy="no-referrer"></iframe>

<script>
    $(document).ready(function () {
        document.getElementById("PixelFrame").setAttribute("src", "https://www.<?php echo $currentdomain; ?><?php echo $PixelPage; ?>");

    });

    function fbq() {
        document.getElementById("PixelFrame").contentWindow.postMessage( [].slice.call(arguments), '*')


    }
</script>
