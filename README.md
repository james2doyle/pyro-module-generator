PyroCMS Module Generator
=======================

### Version 2.0

This generator will allow you to fill in a form and generate a module. It is built with [PhalconPHP](http://phalconphp.com/en/) because phalcon is crazy fast and easy to make small apps with.

# YOU MUST HAVE PHALCONPHP INSTALLED TO USE THIS APP

[Install Phalcon First](http://phalconphp.com/en/download).

### Usage

Just throw it in your localhost and point your browser to it. There is no database. It just writes and renames files for you.

If you you **used a custom url** (and didn't just clone as `pyro-module-generator`), then open the [config/config.php and change the baseUri](https://github.com/james2doyle/pyro-module-generator/blob/master/config/config.php#L7).

##### Writeable Folders

* cache/volt/
* public/generated/

#### Genrated Modules

**Included in all generated modules:**

* includes `ID` field by default
* includes `order` field by default
* includes functionality for drag and drop table order (add `ui-sortable-container` to `tbody` in admin index view)
* basic function for files included but commented out
* \_form\_data function for passing data to form views
* settings table included but commented out

The generated module is in the `public/generated/` folder.

![screenshot](https://raw.githubusercontent.com/james2doyle/pyro-module-generator/master/screenshot.jpeg)

### Todo

* More than just text and textarea forms
* Clean up
* Use DIRECTORY_SEPARATOR more

### License

(The MIT License)

Copyright (c) 2014 James Doyle(@james2doyle) james2doyle@gmail.com

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.