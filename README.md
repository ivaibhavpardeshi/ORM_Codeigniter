# ORM_Codeigniter

##How to use ?
1. Place My_Model.php in your codeigniters "root/application/core" folder
2. Write any model and extend them with "My_Model" class
3. And access the functions from model.

NOTE : Use the setTable method of class to perform any operation on that table

##Usage :
1. Setting table for performing query operation : 
   $this->setTable("users");
2. Fetch all record from the table : 
   $object = $this->fetchAll();
3. Fetch selected record by ID : 
   $object = $this->fetchById(2);
4. Fetch selected record by specifying array : 
   $where = array('name'=>'Ram');
   $object = $this->fetchByArray($where);
5. Insert the record :
   $data = array('name'=>'Ram','contact'=>'1020304050');
   $ret = $this->insert($data);
6. Update the record :
   $where = array('id'=>$id);
   $data = array('name'=>'Rama');
   $ret = $this->update($data,$where);
7. Delete the record :
   $where = array('id'=>$id);
   $ret = $this->delete($where);
