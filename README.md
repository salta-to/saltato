Saltato
===


Installation
---------------

### Requirements

`Saltato` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- [Grunt](https://gruntjs.com/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'saltato'` (inside single quotations) to capture the text domain and replace with: `'megatherium-is-awesome'`.
2. Search for `saltato_` to capture all the functions names and replace with: `megatherium_is_awesome_`.
3. Search for `Text Domain: saltato` in `style.css` and replace with: `Text Domain: megatherium-is-awesome`.
4. Search for <code>&nbsp;saltato</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for `saltato-` to capture prefixed handles and replace with: `megatherium-is-awesome-`.
6. Search for `SALTATO_` (in uppercase) to capture constants and replace with: `MEGATHERIUM_IS_AWESOME_`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `saltato.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

### Setup

To start using the tools that come with `saltato`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`saltato` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `grunt build` : build css and js files for production.
- `grunt watch` : automatically build css and js files during development.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
