<?php


/*
Description :
    +path name: foldername.filename
    +get name folder after folder Views

*/
    class BaseController {

        const VIEW_FOLDER_NAME='Views';
        const MODEL_FOLDER_NAME='Models';

        protected function loadView($viewPath,array $data=[]){
           
            foreach ($data as $key =>$value)
            {
                $$key=$value;
            }
           require (self::VIEW_FOLDER_NAME . '/' . str_replace('.','/',$viewPath) . '.php');// truocứ required có biến thì có thể lấy ra được từ trang view
        }

        protected function loadModel ($modelPath){

           require (self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php');// truocứ required có biến thì có thể lấy ra được từ trang view

        }
    }


?>