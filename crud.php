<?php  
 class Crud  
 {  
      //crud class  
      public $connect;  
      private $host = "localhost";  
      private $username = 'root';  
      private $password = '';  
      private     $database = 'employee';  
      function __construct()  
      {  
           $this->database_connect();  
      }  
      public function database_connect()  
      {  
           $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
      }  
      public function execute_query($query)  
      {  
           return mysqli_query($this->connect, $query);  
      }  
      public function get_data_in_table($query)  
      {  
           $output = '';  
           $result = $this->execute_query($query);  
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr> 
                    <th width="10%">Id No</th> 
                     <th width="35%">First Name</th>  
                     <th width="35%">Last Name</th>
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>  
                      <td>'.$row->idno.'</td>
                     <td>'.$row->firstname.'</td>  
                     <td>'.$row->lastname.'</td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           return $output;  
      }
 }  
 ?>  