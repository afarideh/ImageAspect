# ImageAspect
ImageAspect - A simple Image Aspect Ratio crop coordination generator.

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

// y is integer to crop from top of image
$coordinates->getY();

// width is integer to crop to right of image and width of final width in expected aspect ratio
$coordinates->getWidth();

// height is integer to crop to bottom of image and width of final height in expected aspect ratio
$coordinates->getHeight();

```

## ImageAspectModel object

| Method            | Value                                    | Type           |
| :---------------- | :--------------------------------------- | :------------- |
|  **getWidth()**   | Width of Image in expected Aspect ratio  | integer        |
|  **getHeight()**  | Height of Image in expected Aspect ratio | integer        |
|  **getX()**       | Start area from left of image to crop    | integer        |
|  **getY()**       | Start area from top of image to crop     | integer        |
