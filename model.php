<?php 
            
require_once 'model_login.php';

class Model
{
                                                                        // Array to store our key/value attributes
    private $attributes = array();
    protected static $table;
    protected static $dbc;

    /*
     * Set a new attribute for the object
     */
                                                                        // Magic setter to populate $attributes array
    public function __set($name, $value)
    {
        // Set the $name key to hold $value in $attributes
        $this->attributes[$name] = $value;
    }

    /*
     * Get a value from attributes based on name
     */
                                                                        // Magic getter to retrieve values from $attributes
    public function __get($name)
    {
        // Check for existence of array key $name
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        return null;
    }
    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    private static function dbConnect()
    {
        if (!self::$dbc)
        {
            require 'db_connect.php';
            self::$dbc = $dbc;
        }
    }

    public static function getTableName()
    {
            return static::$table;
    }

    /*
     * Persist the object to the database
     */
    public function save()
    {
                                                                                    // @TODO: Ensure there are attributes before attempting to save
        if(!empty($this->attributes)) { 
            if (isset($attributes['id'])) {
                $this->update($this->attributes['id']);
            } else {
                $this->insert();
            }
        }
    }
                                                                        // @TODO: Perform the proper action - if the `id` is set, this is an update, if not it is a insert

                                                                        // @TODO: Ensure that update is properly handled with the id key

                                                                        // @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id

                                                                        // @TODO: You will need to iterate through all the attributes to build the prepared query

                                                                        // @TODO: Use prepared statements to ensure data security
    protected function insert()
    {
        $keysArray = array_keys($this->attributes);
        $table = static::$table;

        $query = "INSERT INTO $table (";
        $query .= implode(',', $keysArray);
        $query .= ") VALUES (";
            foreach($keysArray as $key){
                $newKeysArray[] = ":". $key;
            }

        $query .= implode(',', $newKeysArray);
        $query .= ");";

        $stmt1 = self::$dbc->prepare($query);
            foreach($this->attributes as $key => $value) 
            {
                $stmt1->bindValue(':' . $key, $value, PDO::PARAM_STR);
            }

        $stmt1->execute();
    }
    
    protected function update($id)
    {
        $sql = "UPDATE" .static::$table. "SET $column = $value WHERE id = $id";
        
        foreach ($this->attributes as $key => $value) 
        {
            if($key == "id")
            {
                continue;
            }
            $stmt1->bindValue(':'. $key, $value, PDO::PARAM_STR);
        } 
        $stmt1->execute();
    }

    /*
     * Find a record based on an id
     */
    public static function find($id)
    {
                                                                // Get connection to the database
        self::dbConnect();

                                                                // @TODO: Create select statement using prepared statements
        $query = "SELECT * FROM " .static::$table ." WHERE id = :id";
                                                                // @TODO: Store the resultset in a variable named $result
        $stmt2 = self::$dbc->prepare($query);
        $stmt2->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt2->execute();
        $result = $stmt2->fetch(PDO::FETCH_ASSOC);
                                                                // The following code will set the attributes on the calling object based on the result variable's contents

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    /*
     * Find all records in a table
     */
    public static function all()
    {
        self::dbConnect();
                                                                // @TODO: Learning from the previous method, return all the matching records
        $query = "SELECT * FROM " .static::$table;
        $stmt3 = self::$dbc->prepare($query);
        $stmt3->execute();
        return $stmt3->fetchAll(PDO::FETCH_ASSOC);

    }
    public static function delete($id)
    {
        self::dbConnect();
        $query = "DELETE FROM ". static::$table. " WHERE id = :id";
        $stmt4 = self::$dbc->prepare($query);
        $stmt4->bindValue('id', $id, PDO::PARAM_INT);
        $stmt4->execute();
    }
}


