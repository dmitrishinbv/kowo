/*добавляем карту*/
jQuery(document).ready(function () {
    let map = new L.map( 'map');
    // Creating a Layer object
    let layer = new L.TileLayer( 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png' );
    // Adding layer to the map
    map.addLayer( layer );
    // Creating a marker
    let marker = L.marker( [ 48.50498, 32.2599 ] );

    // Adding marker to the map
    marker.addTo( map );
    function mapCenter(){
        // const width = jQuery( window ).width();
        let center = [ 48.50498, 32.2599];
        let zoom = 14;
        map.setView( center, zoom );
    }

    jQuery( window ).on( 'load resize', mapCenter );
});