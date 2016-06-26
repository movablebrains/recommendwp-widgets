<?php
function rwpw_thumb($url, $width, $height=0, $align='') {
    return mr_image_resize($url, $width, $height, true, $align, false);
}