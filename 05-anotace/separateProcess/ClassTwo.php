<?php
class ClassTwo
{
    public function getMyConstant()
    {
        include "const.php";
        return MY_CONST;
    }
}