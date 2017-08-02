<?php 
   

    class QueryBuilder{
        protected $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function selectAll($table){
            $statement = $this->pdo->prepare("SELECT * FROM ${table}");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS);
        }

        public function selectById($table,$idNum){
            $statement = $this->pdo->prepare("SELECT * FROM ${table} WHERE id = ${idNum}");
            $statement->execute();
            return $statement->fetch();
        }

        //$parameters 為 關係陣列
        public function insertItem($table,$parameters){
            
            $sql = sprintf(
                //INSERT INTO tableName (key, key2...) 
                //VALUES(:key1, :key2...)
                'INSERT INTO %s (%s) VALUES(%s)',
                $table,
                implode(', ', array_keys($parameters)),
                ':'.implode(', :', array_keys($parameters))
            );

            
            try{
                $statement = $this->pdo->prepare($sql);

                //bind value!
                // $statement->bindParam(':name', 'Joe');

                //$parameter = ["key1" => "value1", "key2" => "value2"]
                $statement->execute($parameters);
            } catch(Exception $e){

                die($e->getMessage());
            }
            
        }
        
    } 

?>
    
