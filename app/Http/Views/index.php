<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="http://local.endouble-insights.com/css/main.css">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />


</head>
<body>

<header>
    <h1>Insights</h1>
</header>

<main>
    <section class="dynamic-map">
        <?php include 'map.php'; ?>
    </section>

    <aside class="map-sidebar">
        <?php include 'partials/box.php'; ?>
    </aside>
</main>

</body>
</html>
