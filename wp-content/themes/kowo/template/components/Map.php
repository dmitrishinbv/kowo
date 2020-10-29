<?php
function AddMap()
{
    do_action('MapStyle');
    do_action('MapScript');
    ?>
    <div id="map" class="map-initial"></div>
    <?php
}
?>