# WordPress 960

This theme is designed to integrate the 960 grid system design principles into WordPress site design and maintenance.

This theme is currently limited to 960px width divided into 12 columns with 5 pixel margins on each column.
I hope to increase the flexibility by taking advantage of the fluid width abilities of the 960 framework and adding a width option to the theme options screen.

In it's current implimentation the home page consists of a page using the "widget page" template. Once you have selected this to be front page of the site in the reading options, you will have to apply grid_width CSS classes to any of the widgets you have placed within the home page widget area.
The plugin we currently use for this is: Widget Classes by aizatto http://wordpress.org/extend/plugins/widget-classes/

Once you have asigned these widgets to the home page container you will need to style them with CSS - no styling is provided by this framework.

If you use this theme; please report any issues so that we can continue to make this the definitive 960 grid theme for WordPress. 
Feel free to contribute to or fork this repository, every little update helps.

## Templates

This theme is split up into tons of templates, which makes it easier to override just a single part of the theme rather than having to copy & paste a lot of code.

**archive.php**
Main template for showing an archive page of posts, such as by date, category, tags or author.

**content.php**
**content-page.php**
The __content-*.php__ templates display the actual post entries and the theme is built to handle post formats and will use the __content-(format name).php__ template if available, or fall back to the __content.php__ file.

**footer.php**
Footer template, shows the footer widgets and footer navigation.

**header.php**
Header template, shows the title, header widgets and main navigation.

**index.php**
Default main template.

**loop.php**
**loop-archive.php**
**loop-page.php**
**loop-single.php**
Shows the entries for the appropriate types, paginating if necessary.

**page.php**
Main template for displaying a page entry. If you want to modify the look of a page, you should override the __content-page.php__ file instead of this one.

**single.php**
Main template for displaying a single post entry. If you want to modify the look of a page, you should create a __content-page.php__ file instead of this modifying this one.

## TODO

* TODO: Implement dynamic base width for the 960 Grid System.
* TODO: Implement updating system for 960 Grid System.
