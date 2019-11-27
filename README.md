Turbo Support
=================

Turbo Support is a plugin for WordPress that adds additional functionality for the `help.pro.photo` WordPress website.

## Features

* It integrates with the *Accordion Shortcodes* plugin to set some custom defaults for our implementation, such as enabling autoclose and clicktoclose, as well as setting the scroll offset.

* It also adds support for breadcrumbs which come from the *Yoast SEO* plugin.

* It includes custom CSS code which provides additional styling.

* It integrates with the *Relevanssi* search plugin.

* It provides a version selector for searching tutorials (e.g. P6 or P7) and sets a cookie with the visitor's last selection.

* It integrates with the *WooCommerce* plugin for product page styling and other capabilities.

* It adds category taxonomy to WordPress pages.


## NPM scripts

SASS watching and hooks for the ProPhoto support

### Install

After checking out the repo, run:

```
$ npm install
```

### Watch the sass directory for changes, and build to `css/`

After making changes to SASS code, run:

```
$ npm run watch-sass
```

## Release

The plugin does not have a build/deploy process. Instead, we zip the contents while including only the necessary files. Using a command line, enter the repo folder and zip the contents with this command:

```
$ zip -X -r ~/Downloads/turbo-support . --include turbo-support.php css/* hooks/* js/* templates/* views/*
```
