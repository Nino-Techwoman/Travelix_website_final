<?php

// data and function
include('function.php');
include('data.php');

// header
include('./components/header.php');

// carousel
include('./components/carousel.php');

// search categories and form
renderSearchSection($searchData);

// best tours
renderBestTours($bestTours);

// maldives Deluxe
renderMaldivesDeluxe($maldivesPackages);

// best offers
renderBestOffers($bestOffers);

// our clients
renderOurClients($ourClients);

// trending now
renderTrendingNow($trendingNow);

// get in touch - Contact Us
include('./components/contact_section.php');

// footer
include('./components/footer.php');

?>