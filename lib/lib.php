<?php

/**
 * @param string $page
 * @return void
 */
function getContent(string $page) : void
{
    $exts = ['php'];
    if (!empty($page)) {
        foreach ($exts as $ext) {
            $complete_path = $page . '.' . $ext;
            if (file_exists($complete_path)) {
                include_once $complete_path;
                die;
            }
        }
    }
    header('Location: index.php?source=view/default');
    die;
}
