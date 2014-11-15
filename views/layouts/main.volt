<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>PyroCMS Module Generator</title>
  <meta name="description" content="Phalcon is a web framework delivered as a C extension providing high performance and lower resource consumption"/>
  <meta name="author" content="Phalcon Team" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  {{ stylesheet_link("css/bootstrap.min.css") }}
  {{ stylesheet_link("css/style.css") }}
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-40273165-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>
<body>
  <div id="content" class="container">
    {% block content %} {% endblock %}
    <div class="clearfix"></div>
    <footer class="footer">
      <p>&copy; <a href="http://twitter.com/james2doyle" title="James Doyle on Twitter" target="_blank">James Doyle</a> and <a href="http://warpaintmedia.ca" title="WARPAINT Media" target="_blank">WARPAINT Media</a> <?php echo date('Y') ?></p>
    </footer>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  {{ javascript_include("js/main.js") }}
</body>
</html>
