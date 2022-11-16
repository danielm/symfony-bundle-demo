# 🚀 Symfony Bundle Demo

[![Build Status](https://github.com/danielm/symfony-bundle-demo/workflows/Tests/badge.svg)](https://github.com/danielm/symfony-bundle-demo/actions/workflows/tests.yml)
[![Build Status](https://github.com/danielm/symfony-bundle-demo/workflows/PHPCsFixer/badge.svg)](https://github.com/danielm/symfony-bundle-demo/actions/workflows/php-cs-fixer.yml)
[![Build Status](https://github.com/danielm/symfony-bundle-demo/workflows/PHPStan/badge.svg)](https://github.com/danielm/symfony-bundle-demo/actions/workflows/php-stan.yml)

See my blog post about this:

[https://danielmg.org/php/2023/02/extending-symfony-bundle-flex-recipes-and-private-repositories.html](https://danielmg.org/php/2023/02/extending-symfony-bundle-flex-recipes-and-private-repositories.html])

## About

This project is part  of my Post series about how to build a Symfony Flex Recipes repository (private or not).

This bundle is a demo that shows a couple of things yo can do on a Symfony bundle, such as:

### Includes
- Console Command: `bin/console demo:command`
- DemoServiceInterface & DemoService: Example of some kind of Contract/Adapter-like patter of a service
- Events: Custom event `UnnecessaryEvent` and simple EventSubscriber `DemoSubscriber`
- DemoTwigExtension: Adds a twig function `demoFcn()`
- Controller:
  - Route `/{a}/{b}` -> Simple endpoint that returns a Json response with some values and adds `a + b`
  - Route `/view` -> Simple endpoint that renders a Twig template and returns HTML
  - Route `/dispatch/{md5_hash}` -> Simple endpoint to test dispatching our `UnnecessaryEvent` 
- Configuration
  - Using Bundle config parameters
  - Using Custom Env variables `DEMO_SAMPLE_ENV`
- Usage of Translations and public assets.

## Install

### Using Symfony Recipe

```bash
composer require danielm/symfony-bundle-demo
```

### Manually
Same `composer` command as using the Recipe, you will also need to create/edit some files manually (that's what a Symfony recipe does for you)

...

## Composer scripts
Coding Standards (*follows symfony's default rules*)
```bash
# Displays errors
composer run cs:check
# Makes changes
composer run cs:fix
```
Testing
```bash
composer run test
```
PHP code analysis 
```bash
composer run stan
```

## Todo
- Validators examples
- Serialization examples
- Test Event & dispatcher
