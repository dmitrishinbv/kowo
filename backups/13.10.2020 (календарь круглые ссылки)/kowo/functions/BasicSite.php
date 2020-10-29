<?php
function HomePageStyleInc()
{
    wp_enqueue_style('homePageStyle', get_template_directory_uri() . '/css/page-home.css', array('style'), '1.0');
}

add_action('HomePageStyle', 'HomePageStyleInc');

add_action('AddSlider', 'Slider');
function Slider()
{
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/lib/slick.js');
    wp_enqueue_script('slider', get_template_directory_uri() . '/js/slider.js');
    wp_enqueue_style('slickStyleLib', get_template_directory_uri() . '/css/lib/slick.css');
    wp_enqueue_style('slickCustomStyle', get_template_directory_uri() . '/css/components/slider.css');
}


add_action('AddCalendar', 'Calendar');
function Calendar()
{
   wp_enqueue_style('datepickerStyle', get_template_directory_uri() . '/css/lib/datepicker.css');
    wp_enqueue_style('calendarStyle', get_template_directory_uri() . '/css/components/calendar.css');
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/js/lib/jquery-ui.min.js');
    wp_enqueue_script('calendarUk', get_template_directory_uri() . '/js/calendar/datepicker-uk.js');
    wp_enqueue_script('calendarEvents', get_template_directory_uri() . '/js/calendar/events.js');
}

function MapStyleInc()
{
    wp_enqueue_style('mapStyle', get_template_directory_uri() . '/css/components/map.css', array('style'), '1.0');
    wp_enqueue_style('mapStyleLib', get_template_directory_uri() . '/css/lib/leaflet.css', array('style'), '1.0');
}

add_action('MapStyle', 'MapStyleInc');


function MapScriptInc()
{
    wp_enqueue_script('mapScript', get_template_directory_uri() . '/js/map/map.js');
    wp_enqueue_script('mapLib', get_template_directory_uri() . '/js/lib/leaflet.js');
}

add_action('MapScript', 'MapScriptInc');


function ContactsBlockStyleInc()
{
    wp_enqueue_style('contactsStyle', get_template_directory_uri() . '/css/components/contacts-block.css', array('style'), '1.0');
}

add_action('ContactsBlockStyle', 'ContactsBlockStyleInc');


function FaqBlockStyleInc()
{
    wp_enqueue_style('faqStyle', get_template_directory_uri() . '/css/components/faq-block.css', array('style'), '1.0');
}

add_action('FaqBlockStyle', 'FaqBlockStyleInc');


function PageTopSectionStyleInc()
{
    wp_enqueue_style('pageTopSectionStyle', get_template_directory_uri() . '/css/components/page-top-section.css', array('style'), '1.0');
}

add_action('PageTopSectionStyle', 'PageTopSectionStyleInc');


function GradientLineStyleInc()
{
    wp_enqueue_style('gradientLineStyle', get_template_directory_uri() . '/css/components/gradient-line.css', array('style'), '1.0');
}

add_action('GradientLineStyle', 'GradientLineStyleInc');


function BtnStyleInc()
{
    wp_enqueue_style('btnStyle', get_template_directory_uri() . '/css/components/btn.css', array('style'), '1.0');
}

add_action('BtnStyle', 'BtnStyleInc');


function AvailablePlacesStyleInc()
{
    wp_enqueue_style('availablePlacesStyle', get_template_directory_uri() . '/css/components/available-places.css', array('style'), '1.0');
}

add_action('AvailablePlacesStyle', 'AvailablePlacesStyleInc');


function GalleryStyleInc()
{
    wp_enqueue_style('galleryStyle', get_template_directory_uri() . '/css/components/gallery.css', array('style'), '1.0');
}

add_action('GalleryStyle', 'GalleryStyleInc');


function KowoAccessoriesStyleInc()
{
    wp_enqueue_style('kowoAccessoriesStyle', get_template_directory_uri() . '/css/components/kowo-accessories.css', array('style'), '1.0');
}

add_action('KowoAccessoriesStyle', 'KowoAccessoriesStyleInc');


function PageEventsStyleInc()
{
    wp_enqueue_style('pageEventsStyle', get_template_directory_uri() . '/css/page-events.css', array('style'), '1.0');
}

add_action('PageEventsStyle', 'PageEventsStyleInc');

function PageSchoolStyleInc()
{
    wp_enqueue_style('pageSchoolStyle', get_template_directory_uri() . '/css/page-school.css', array('style'), '1.0');
}

add_action('PageSchoolStyle', 'PageSchoolStyleInc');


function PageKowoworkStyleInc()
{
    wp_enqueue_style('pageKowoworkStyle', get_template_directory_uri() . '/css/page-kowowork.css', array('style'), '1.0');
}

add_action('PageKowoworkStyle', 'PageKowoworkStyleInc');


function PageKowoworkScriptsInc()
{
    wp_enqueue_script('pageKowoworkScript', get_template_directory_uri() . '/js/page-kowowork/add_padding.js');
}

add_action('PageKowoworkScripts', 'PageKowoworkScriptsInc');


function PageOrganizersStyleInc()
{
    wp_enqueue_style('pageOrganizersStyle', get_template_directory_uri() . '/css/page-organizers.css', array('style'), '1.0');
}

add_action('PageOrganizersStyle', 'PageOrganizersStyleInc');

function SingleAvailablePlacesStyleInc()
{
    wp_enqueue_style('singleAvailablePlacesStyle', get_template_directory_uri() . '/css/single-available-places.css', array('style'), '1.0');
}

add_action('SingleAvailablePlacesStyle', 'SingleAvailablePlacesStyleInc');


function SinglePostsStyleInc()
{
    wp_enqueue_style('singlePostsStyle', get_template_directory_uri() . '/css/single.css', array('style'), '1.0');
}

add_action('SinglePostsStyle', 'SinglePostsStyleInc');


function PhotoBlockStyleInc()
{
    wp_enqueue_style('photoBlockStyle', get_template_directory_uri() . '/css/components/photo-block.css', array('style'), '1.0');
}

add_action('PhotoBlockStyle', 'PhotoBlockStyleInc');


function CalendarStyleInc()
{
    wp_enqueue_style('calendarStyle', get_template_directory_uri() . '/css/components/calendar.css', array('style'), '1.0');
}

add_action('CalendarStyle', 'CalendarStyleInc');

// Add Fancy Box Script
function FancyBoxInc()
{
    wp_enqueue_style('fancyboxStyle', get_template_directory_uri() . '/css/lib/jquery.fancybox.min.css');
    wp_enqueue_script('fancyboxJs', get_template_directory_uri() . '/js/lib/jquery.fancybox.min.js');
//    wp_enqueue_script('fancyboxGallery', get_template_directory_uri() . '/js/lib/add_fancybox_gallery.js');
}

add_action('FancyBox', 'FancyBoxInc');

// Add scroll script
function AddScriptsFooterInc()
{
    wp_enqueue_script('ScrollScript', get_template_directory_uri() . '/js/scroll.js');
    wp_enqueue_script('BurgerScript', get_template_directory_uri() . '/js/header/burger.js');
}

add_action('AddScriptsFooter', 'AddScriptsFooterInc');