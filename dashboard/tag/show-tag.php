<?php

    require_once('../connection.php');
    $conn = Connect();

    $prdid = $conn->real_escape_string($_POST['prodid']);

    $taglist=mysqli_query($conn,"SELECT tag_id, tag_name FROM tags");
    mysqli_close($conn);

    if (mysqli_num_rows($taglist) > 0)
    {

        while($tag = mysqli_fetch_assoc($taglist)) {

            $tagid = $tag["tag_id"];

            $conn = Connect();
            $setcheck = mysqli_query($conn,"SELECT t_tag_id FROM tag_set WHERE t_prod_id = $prdid AND t_tag_id = $tagid");
            mysqli_close($conn);

            if (mysqli_num_rows($setcheck) > 0) {
                $checked = 'Checked';
            } else {
                $checked = '';
            }

            echo "<div class='check'>";
                echo "<input type='checkbox' name='tagset[]' value=".$tag["tag_id"]." id='tag".$tag["tag_id"]."' $checked>";
                echo "<label for='tag".$tag["tag_id"]."'></label>";
                echo "<span for='tag".$tag["tag_id"]."'>".$tag["tag_name"]."</span>";
            echo "</div>";
        }
    }

?>