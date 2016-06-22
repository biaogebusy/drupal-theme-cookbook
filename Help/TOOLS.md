### Sublime
#### [Download](https://www.sublimetext.com/3)
#### Text Plugins
* Emmet  - [web-developer’s toolkit that can greatly improve your HTML & CSS workflow](http://docs.emmet.io/cheat-sheet/);
* jQuery Snippets pack
* Sublime Prefixr
* drupal completions
* Git

### API
* [backbonejs](http://backbonejs.org/)
* [less](http://lesscss.org/)
* [sass](http://sass-lang.com/install)
* [jquery](https://api.jquery.com/)
* [drupal](https://api.drupal.org/api/drupal)
* [underscorejs](http://underscorejs.org/)
* [angularjs](https://docs.angularjs.org/api)
* [symfony](http://symfony.com/doc/current/reference/index.html)
* [npmjs](https://docs.npmjs.com/)

### HELP
* [stackoverflow](http://stackoverflow.com/)

### NPM && BOWER
* [Install nodejs / npm](https://nodejs.org/en/)
> $ npm init

* [Install Bower](https://bower.io/)
> $ bower init


#### NPM RUN
```bash
  "watch-css": "catw -c 'lessc -' 'less/index.less' -o css/bundle.css -v",
  "watch-js": "watchify js/index.js -o  js/init.js -dv",
  "watch": "npm run watch-css & npm run watch-js",
  "build-css": "lessc less/index.less | uglifycss > css/bundle.css",
  "build-js": "browserify js/index.js | uglifyjs -c -m > js/init.js",
  "build": "npm run build-css && npm run build-js",
  "test": "echo \"Error: no test specified\" && exit 1"
```

#### NPM Front-End

```bash
  "bootstrap": "^3.3.4",
  "browserify": "^10.1.3",
  "catw": "^1.0.1",
  "handlebars": "^4.0.5",
  "jquery": "^2.1.4",
  "jquery.cookie": "^1.4.1",
  "less": "^2.5.0",
  "uglify-js": "^2.4.23",
  "uglifycss": "0.0.15",
  "underscore": "^1.8.3",
  "watchify": "^3.2.1",
  "autosize": "^3.0.14",
  "device.js": "git://github.com/matthewhudson/device.js.git",
  "hammerjs": "^2.0.4",
  "photoswipe": "^4.0.8",
  "velocity-animate": "^1.2.2",
```

#### NPM Backbone && Angular

```bash
    "backbone": "1.2.3",
    "backbone-fetch-cache": "^1.5.5",
    "backbone.marionette": "^2.4.2",
    "backbone.radio": "^0.9.1",
    "handlebars": "^3.0.3",
    "hbsfy": "^2.2.1",
    "moment": "^2.10.3",
    "i18next-client": "^1.11.1",
    "jasmine-core": "^2.3.4",
    "karma": "^0.13.15",
    "karma-chrome-launcher": "^0.2.1",
    "karma-jasmine": "^0.3.6",
    "underscore.string": "^3.1.1",
```


### BOWER

```bash
	"Swiper": "swiper#^3.3.1",
	"swiper": "~2.7.6",
	"animate.css": "https://github.com/daneden/animate.css.git#^3.5.1",
	"all-animation": "git@github.com:all-animation/all-animation.git#~2.1.2",
	"jquery-ui": "git@github.com:jquery/jquery-ui.git#~1.11.4",
	"ScrollToFixed": "https://github.com/bigspotteddog/ScrollToFixed.git#^1.0.6",
	"jQuery-One-Page-Nav": "https://github.com/davist11/jQuery-One-Page-Nav.git#^3.0.0",
	"qtip2": "git@github.com:qTip2/qTip2.git#^3.0.2",
	"perfect-scrollbar": "^0.6.11",
```


"select2": "^4.0.2"