@include('partials.header')
<div class="boxed">
<header class="center">
<h1>PyroCMS Module Generator</h1>
<h4>Created by <a target="_blank" href="https://twitter.com/james2doyle">James Doyle</a></h4>
<h5>Version 1.2</h5>
</header>
<h4>The <strong><?php echo $module; ?></strong> module has been generated. Download <a href="<?php
echo $url ?>/generated/<?php echo $module; ?>.zip"><?php echo $module; ?>.zip</a></h4>
</div>
@include('partials.footer')
