# ORM_Codeigniter

## How to use ?
1. Place My_Model.php in your codeigniters "root/application/core" folder
2. Write any model and extend them with "My_Model" class
3. And access the functions from model.

#### NOTE : Use the setTable method of class to perform any operation on that table

## Usage :
1. Setting table for performing query operation : 
    *_$this->setTable("users");_
2. Fetch all record from the table : 
    *_$object = $this->fetchAll();_
3. Fetch selected record by ID : 
    *_$object = $this->fetchById(2);_
4. Fetch selected record by specifying array : 
    *_$where = array('name'=>'Ram');_
    *_$object = $this->fetchByArray($where);_
5. Insert the record :
    *_$data = array('name'=>'Ram','contact'=>'1020304050');_
    *_$ret = $this->insert($data);_
6. Update the record :
    *_$where = array('id'=>$id);_
    *_$data = array('name'=>'Rama');_
    _$ret = $this->update($data,$where);_
7. Delete the record :
    *_$where = array('id'=>$id);_
    *_$ret = $this->delete($where);_
