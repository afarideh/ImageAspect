# ImageAspect
ImageAspect - A simple Image Aspect crop coordination generator.

# Install
Composer 
```bash
composer require mafa/imageaspect
```

# Quick Example 

```bash

$imageAspect = new \MAfa\ImageAspect\ImageAspect(800, 440);
$coordinates = $imageAspect->aspect(2, 1)->generateCoordinates();

// X is integer to crop from left of image
$coordinates->getX();

// Y is integer to crop from top of image
$coordinates->getY();

// Width is integer to crop to right of image and width of final width in expected aspect
$coordinates->getWidth();

// Height is integer to crop to bottom of image and width of final height in expected aspect
$coordinates->getHeight();

```
