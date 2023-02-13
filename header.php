<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package factory
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="canonical" href="<?php echo get_the_permalink(); ?>" />
  <?php /* OGP settings ---------------------------------- */ ?>
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo get_the_permalink(); ?>">
  <meta property="og:site_name" content="">
  <meta property="og:title" content="">
  <meta property="og:description" content="">
  <meta property="og:image" content="<?php print get_template_directory_uri(); ?>/assets/img/shared/ogp.jpg">
  <meta name="twitter:card" content="summary_large_image">
  <!-- favicon, touch-icon -->
  <link rel="shortcut icon" href="<?php print get_template_directory_uri(); ?>/favicon.ico">
  <link rel="apple-touch-icon" href="<?php print get_template_directory_uri(); ?>/assets/img/shared/apple-touch-icon.png">
  <!-- css -->
  <link rel="stylesheet" href="<?php print get_template_directory_uri(); ?>/assets/css/share.css">
  <?php wp_head(); ?>
  <script src="<?php print get_template_directory_uri(); ?>/assets/lib/main.js" defer="defer"></script>
  <script src="<?php print get_template_directory_uri(); ?>/assets/lib/locales/en-au.js" defer="defer"></script>
  <link rel="stylesheet" href="<?php print get_template_directory_uri(); ?>/assets/lib/main.css">
  <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
  <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
  <script>
    //Full Calendar
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'en-au',
        plugins: ['dayGrid', 'googleCalendar'],
        googleCalendarApiKey: 'AIzaSyDOQrlhRvF3gZj502RW9FfCnGuUQ8DO5cw',
        events: 'b9f77737eaaed60ce211d19ad1e3200c32296b085a66674df69e150130dd1f73@group.calendar.google.com'
      });
      calendar.render();
    });
  </script>

  <script>
 document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      dayCellContent: function(e) {
        e.dayNumberText = e.dayNumberText.replace('日', '');
      },
      headerToolbar: {
        left: 'prev',
        center: 'title',
        right: 'next'
      },
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      selectable: true,
      locale: 'en-au',
      googleCalendarApiKey: 'AIzaSyDOQrlhRvF3gZj502RW9FfCnGuUQ8DO5cw', // api-key
      eventSources: [
            {
              googleCalendarId: 'b9f77737eaaed60ce211d19ad1e3200c32296b085a66674df69e150130dd1f73@group.calendar.google.com'
            },
            {
              googleCalendarId: 'en.mm#holiday@group.v.calendar.google.com',
              className: 'holiday-event'
            }
          ]//calendar-id
    });
    calendar.render();
  });
  </script>
</head>

<body>
  <!-- ===============  header ============== -->
  <header class="header">
    <div class="inner">
      <div class="header-content">
        <div class="logo">
          <a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/img_logo.png" width="122" height="50" loading="lazy"></a>
        </div>
        <div class="hamburger js-hamburger s-sp">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <ul class="nav-list js-slide">
          <li class="nav-child"><a href="<?php echo get_bloginfo('url'); ?>" class="nav-link">HOME</a></li>
          <li class="nav-child service">Service
            <ul class="subnav-list">
              <li class="subnav-child"><a href="" class="subnav-link">Web/SNS Monitoring</a></li>
              <li class="subnav-child"><a href="" class="subnav-link">Engagement</a></li>
              <li class="subnav-child"><a href="" class="subnav-link">Investigation</a></li>
              <li class="subnav-child"><a href="" class="subnav-link">Column</a></li>
              <li class="subnav-child"><a href="" class="subnav-link">Operation</a></li>
            </ul>
          </li>
          <li class="nav-child"><a href="#" class="nav-link">CaseStudy</a></li>
          <li class="nav-child"><a href="<?php echo site_url(); ?>/column/" class="nav-link">Column</a></li>
          <li class="nav-child"><a href="#" class="nav-link">Operation Company</a></li>
          <div class="btn-gp">
            <a href="<?php echo site_url(); ?>/contact/" class="inquiry"><span>Inquiry</span></a>
            <a href="<?php echo site_url(); ?>/contact/" class="phno"><span>09-123456789</span></a>
          </div>
        </ul>
      </div>

      <form role="search" method="get" class="searchform" action="<?php echo home_url('/'); ?>">
        <label>
          <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
          <input type="search" class="search-field search" placeholder="<?php echo esc_attr_x('Search …', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
          <input type="hidden" value="<?php echo get_search_query() ?>" />
        </label>
        <input type="submit" class="searchsubmit" value="<?php echo esc_attr_x('Search', 'submit button') ?>" />
      </form>
    </div>
  </header>
  <!-- ./header -->