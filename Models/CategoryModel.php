<h1>CategoryModel</h1>
<?php
class CategoryModel extends BaseModel{
    const TABLE = 'categories';
    public function getAllCategories($select=['*'],$orderBy=[],$limit=15){
       return $this->getAllData(self::TABLE,$select,$orderBy,$limit);
    }


    public function findCategoryById ($id){
        return $this->findById(self::TABLE, $id);
    }
}

?>