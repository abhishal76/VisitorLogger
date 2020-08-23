<?php
echo "<ul class='pagination pull-left margin-zero mt0'>";
if($page>1){
    $prev = $page - 1;
    echo "<li>";
        echo "<a href='{$page_url}page={$prev}'>";
            echo "<span style='margin:0 .5em;'>&laquo;</span>";
        echo "</a>";
    echo "</li>";
}
$total = ceil($total_rows / $records_per_page);
$range = 1;

$initial_num = $page - $range;
$limit_num = ($page + $range)  + 1;

for ($i=$initial_num; $i<$limit_num; $i++) {

    if (($i > 0) && ($i <= $total)) {

        if ($i == $page) {
            echo "<li class='active'>";
                echo "<a href='javascript::void();'>{$i}</a>";
            echo "</li>";
        }

        else {
            echo "<li>";
                echo " <a href='{$page_url}page={$i}'>{$i}</a> ";
            echo "</li>";
        }
    }
}

if($page<$total){
    $next_page = $page + 1;

    echo "<li>";
        echo "<a href='{$page_url}page={$next_page}'>";
            echo "<span style='margin:0 .5em;'>&raquo;</span>";
        echo "</a>";
    echo "</li>";
}

echo "</ul>";
?>
