<?php
class ClassOne
{
    public function getMyConstant()
    {
        include "const.php";
        return MY_CONST;
    }
}