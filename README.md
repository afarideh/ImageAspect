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

// Response is a ImageAspectModel object
MAfa\ImageAspect\ImageAspectModel {
  -width: 800
  -height: 400
  -x: 0
  -y: 0
}

// x is integer to crop from left of image
$coordinates->getX();

// x is integer to crop from top of image
$coordinates->getY();

// width is integer to crop to right of image and width of final width in expected aspect
$coordinates->getWidth();

// height is integer to crop to bottom of image and width of final height in expected aspect
$coordinates->getHeight();

```

## ImageAspectModel object

| Method            | Value                                    | Type           |
| :---------------- | :--------------------------------------- | :------------- |
|  **getWidth()**   | Width of Image in expected Aspect        | integer        |
|  **getHeight()**  | Height of Image in expected Aspect       | integer        |
|  **getX()**       | Start area from left of image to crop    | integer        |
|  **getX()**       | Start area from bottom of image to crop  | integer        |
