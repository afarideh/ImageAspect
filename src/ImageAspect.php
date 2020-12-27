<?php


namespace MAfa\ImageAspect;


use Brick\Math\Exception\DivisionByZeroException;

class ImageAspect
{

    private $imageWidth,
        $imageHeight,
        $aspectWidth = 0,
        $aspectHeight = 0;
    /**
     * ImageAspect constructor. Pass Current Width & Height of Image
     * @param int $imageWidth
     * @param int $imageHeight
     */
    public function __construct(int $imageWidth, int $imageHeight)
    {
        if($imageWidth <= 0 || $imageHeight <= 0)
            throw new \Exception("Width and Height must be greater than 0");
        $this->imageWidth = $imageWidth;
        $this->imageHeight = $imageHeight;
        return $this;
    }

    /**
     * Pass w & h to generate coordinates, for example to get aspect 3:2 call getCoordinates(3, 2).
     *
     * @param int $aw
     * @param int $ah
     * @return $this
     */
    public function aspect(int $aw, int $ah){
        $this->aspectHeight = $ah;
        $this->aspectWidth = $aw;
        return $this;
    }

    /**
     * Call This method to get the coordinates, Response is type of ImageAspectModel class that has final width, height, x and y.
     *
     * @return ImageAspectModel
     */
    public function generateCoordinates(){
        if($this->aspectHeight <= 0 || $this->aspectWidth <= 0)
            throw new DivisionByZeroException("Width and Height must be greater than 0");
        $imageAspectModel = new ImageAspectModel();

        $imageAspectModel->setHeight($this->imageHeight);
        $imageAspectModel->setWidth($this->imageWidth);


        $aspect = $this->aspectWidth / $this->aspectHeight;
        if($this->aspectWidth < $this->aspectHeight){
            $aspect = $this->aspectHeight / $this->aspectWidth;
        }
        $imageAspect = $this->imageWidth / $this->imageHeight;

        if($imageAspect > $aspect){
            if($this->imageHeight < $this->imageWidth){
                $imageAspectModel->setWidth((int) ($this->imageHeight * $aspect));
            }else if($this->imageHeight > $this->imageWidth){
                $imageAspectModel->setWidth((int) ($this->imageHeight / $aspect));
            }else if($this->imageHeight == $this->imageWidth){
                $imageAspectModel->setHeight((int) ($this->imageWidth * $aspect));
            }
        }else if($imageAspect < $aspect){
            if($this->imageHeight < $this->imageWidth){
                $imageAspectModel->setHeight((int) ($this->imageWidth / $aspect));
            }else if($this->imageHeight > $this->imageWidth){
                $imageAspectModel->setHeight((int) ($this->imageWidth / $aspect));
            }else if($this->imageHeight == $this->imageWidth){
                $imageAspectModel->setWidth((int) ($this->imageHeight * $aspect));
            }
        }
        $imageAspectModel->setX((int)(($this->imageWidth - $imageAspectModel->getWidth()) / 2));
        $imageAspectModel->setY((int)(($this->imageHeight - $imageAspectModel->getHeight()) / 2));
        return $imageAspectModel;
    }

}
