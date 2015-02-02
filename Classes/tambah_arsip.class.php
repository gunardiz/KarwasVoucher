<?php
/************************************************************************/
/* DynamicDropDown.class.php                                            */
/* =====================================================================*/
/* @Copyright (c) 2005 by Gobinath  (gobinathm at gmail dot com)        */
/*                                                                      */
/* @Author(s): Gobinath                                                 */
/*                                                                      */
/* @Version: 1.0.0     @Version Date: May 2nd, 2005                     */
/*                                                                      */
/* @Package: DynamicDropDown (Title:  Dynamic Drop Down 3 Level)        */
/* =====================================================================*/
/* @Purpose:                                                            */
/* The class is to Fetch values from the DB and display in 3 ListBox    */
/*                                                                      */
/* @Reason: The 2nd & 3rd DropDown Will be based on the Selection of    */
/*          of the previous listbox value                               */
/************************************************************************/


class DynamicDropDown{

    //Database Connection Variable
    var $db_con;         //Database Connection Variable
    var $rs_con;         //Table Connection Variable

    //Variable to Hold Form Name
    var $FrmObjName;

    //Array Variables, this is the Variable which will Hold the Value fetched from the Tables
    var $arrjenisal1;
    var $arrjarsipl2;
    var $arrjalain3;

    //Sql Variables, Used for storing the SQL Statements
    var $jenisal1Sql;
    var $jarsipl2Sql;
    var $jalain3Sql;

    //Result variables, Used to Store the Result Resource
    var $jenisal1Result;
    var $jarsipl2Result;
    var $jalain3Result;

    //Row Variables
    var $jenisal1Row;
    var $jarsipl2Row;
    var $jalain3Row;

    //Loop Variable
    var $IDx;
    var $IDy;
    var $IDz;


    //Purpose: Constructor of the Function, which will establish the database Connection and Array initialization
    function DynamicDropDown($dbConfig){
        // Connects to the Mysql Server
        $this->db_con=mysql_connect($dbConfig['server'],$dbConfig['username'],$dbConfig['password']) or die(mysql_errno());
        // Select the Database
        $this->rs_con=mysql_select_db($dbConfig['database'],$this->db_con);

        // Array variable initialization
        $this->arrjenisal1=array();
        $this->arrjarsipl2=array();
        $this->arrjalain3=array();


        //Initialization of the Loop Variables
        $this->IDx=0;
        $this->IDy=0;
        $this->IDz=0;
    }

    //Purpose: The Function will act like a Destructor for this Class
    function DynamicDropDown_Close(){   // The function needs to be called manually to close the connection
        mysql_close($this->db_con);   // Closes the Connection with the Database
        unset($this->FrmObjName,$this->arrjenisal1,$this->arrjarsipl2,$this->arrjalain3);   // destroys the specified Variables
        unset($this);   //Destroys the Object created for the Class
    }

    //Purpose; The Function fetches the Data and loads it in the List Box
    function DataFetch(){
        //Suggestions: The Table names can be changed according to the User. But be carefull with the Query and other variables
        // So that the Script will function Properly
		
		$sifat=$_REQUEST['sifat'];
        $this->jenisal1Sql="select * from jenisal1 WHERE jenisal1_sifat='$sifat'";    //Query to fetch the Data from the table "type"
        $this->jenisal1Result=mysql_query($this->jenisal1Sql); //Execute the Query and Store the result in new variable

        // Start fetching the Values from the Result Resource (typeResult)
        while ( $this->jenisal1Row = mysql_fetch_array($this->jenisal1Result,MYSQL_BOTH)){ // TYPE table Fetch While Loop begins Here
            for($i=0;$i<mysql_num_fields($this->jenisal1Result);$i++){
                  $this->arrjenisal1[$this->IDx][$i]= $this->jenisal1Row[$i];   // Store the Value of the Type table to the Array
            }

            //create a SQL Query for Fetching the Data from the BRAND Table
            $this->jarsipl2Sql="select * from `jarsipl2` WHERE `jenisal1_id`='".$this->jenisal1Row[00]."'";
            $this->jarsipl2Result=mysql_query($this->jarsipl2Sql);  // Execute the Brand Query

            //Start Fetching the Value from the Result resource (brandResult)
            while ($this->jarsipl2Row = mysql_fetch_array($this->jarsipl2Result,MYSQL_BOTH)){ //BRAND Table Fetch While Loop Begins here
                for($i=0;$i<mysql_num_fields($this->jarsipl2Result);$i++){
                    $this->arrjarsipl2[$this->IDy][$i]=$this->jarsipl2Row[$i];   // Stores the Brand data to the Array
                }

                //Create a Sql Query for Fetching the Data From the Model Table
                $this->jalain3Sql="select * from jalain3 WHERE `jarsipl2_id`='".$this->jarsipl2Row[0]."'";
                $this->jalain3Result=mysql_query($this->jalain3Sql);

                //Start Fetching the Value from the Result Resource (ModelResult)
                while($this->jalain3Row=mysql_fetch_array($this->jalain3Result,MYSQL_BOTH)){ //MODEL Table Fetch While Loop Starts Here
                    for($i=0;$i<mysql_num_fields($this->jalain3Result);$i++){
                       $this->arrjalain3[$this->IDz][$i]=$this->jalain3Row[$i];   // Store the Value of the Model table to the Array
                    }
                    $this->IDz += 1;
                }//MODEL Table Fetch While Loop Ends Here

                $this->IDy += 1;
            } //BRAND Table Fetch While Loop Ends here

            $this->IDx += 1;
        } // TYPE table Fetch While Loop Ends Here

    }// DataFetch Function Ends here.

    //Purpose: Member Function to Create the Javascript which loading the values in Different Dropdowns
    function CreateJavaScript($frmName){

        $this->FrmObjName=$frmName;  // Assigns the frmName Value to the Global Variable

        //Assign the Form field Elements
        $Docjarsipl2Element = "document.".$this->FrmObjName.".jarsipl2";
        $Docjalain3Element = "document.".$this->FrmObjName.".jalain3";

        // Java Script Generation Starts here
        echo "\r<script type=\"text/javascript\" language=\"javascript\">";
        echo "\r<!--";
        //Create the Java Script for Loading the BRAND LIST BOX
        echo "\rfunction changejarsipl2(obj){\r";
        for($i=0;$i<count($this->arrjenisal1);$i++){
             echo "\rif(obj.value == '".$this->arrjenisal1[$i][0]."'){\r";
             echo "\r\t/* Loading Values for the Sub Jenis Drop Down */\r";
             echo "\tdocument.$this->FrmObjName.jarsipl2.options.length = 0;\r";
             echo "\t$Docjarsipl2Element.options[$Docjarsipl2Element.options.length] = new Option('--Select--','--Select--');\r";
             for($j=0;$j<Count($this->arrjarsipl2);$j++){
                          //Check the Condition and create the Statement to Load Value for the List Boxes
                          if ( $this->arrjenisal1[$i][0] == $this->arrjarsipl2[$j][2]){
                               echo "\t$Docjarsipl2Element.options[$Docjarsipl2Element.options.length] = new Option('".$this->arrjarsipl2[$j][1]."','".$this->arrjarsipl2[$j][0]."');\r";
                          }
             }
             echo "\tdocument.$this->FrmObjName.jarsipl2.disabled = false;\r";
             echo "\treturn true;\r";
             echo "}\r";
        }
        echo "}\r";
        //Create the Java Script for Loading the MODEL LIST BOX
        echo "\rfunction changejalain3(obj){\r";
        for($i=0;$i<count($this->arrjarsipl2);$i++){
             echo "\rif(obj.value == '".$this->arrjarsipl2[$i][0]."'){\r";
             echo "\r\t/* Loading Values for the Brand Drop Down */\r";
             echo "\tdocument.$this->FrmObjName.jalain3.options.length = 0;\r";
             echo "\t$Docjalain3Element.options[$Docjalain3Element.options.length] = new Option('--Select--','--Select--');\r";
             for($j=0;$j<count($this->arrjalain3);$j++){
                          //Check the Condition and create the Statement to Load Value for the List Boxes
                          if ( $this->arrjarsipl2[$i][0] == $this->arrjalain3[$j][2]){
                               echo "\t$Docjalain3Element.options[$Docjalain3Element.options.length] = new Option('".$this->arrjalain3[$j][1]."','".$this->arrjalain3[$j][0]."');\r";
                          }
             }
             echo "\tdocument.$this->FrmObjName.jalain3.disabled = false;\r";
             echo "\treturn true;\r";
             echo "}\r";
        }
        echo "}\r";
        echo "-->\r";
        echo "</script>\r";  // Javascript ends here
    }


    //Purpose: Member Function to Create Dynamic List Boxs
    function CreateListBox(){
        //TYPE List Box Creation
		 echo "<div class=\"form-row\">";
 		 echo "<span class=\"label\"><b>Jenis Dokumen</b></span>";
         echo "<select class=\"input\" name=\"jenisal1\" size=\"1\" onChange='changejarsipl2(this)'>\r";
		 echo "<option value=''>--Select--</option>\r";
   		 //Loads the Data to the Jenis List Box the one which will have values by default.
         for($i=0;$i<count($this->arrjenisal1);$i++){
		         echo "<option value='".$this->arrjenisal1[$i][0]."'>".$this->arrjenisal1[$i][1]."</option>\r";
  	     }
		 echo "</select>";
 		 echo "</div>";

         //Sub Jenis Box Creation
		 echo $sifat;
		 echo "<div class=\"form-row\">";
 		 echo "<span class=\"label\"><b>Sub Jenis Dokumen</b></span>";
         echo "<select class=\"input\" name=\"jarsipl2\" onChange='changejalain3(this)' disabled >\r";  // By Default the Item is Disabled
         echo "<option value=''>--Select--</option>\r";
	     echo "</select> ";
 		 echo "</div>";
		 
         //Sub Sub Jenis Box Creation
		 echo "<div class=\"form-row\">";
 		 echo "<span class=\"label\"><b>Sub Sub Jenis Dokumen</b></span>";
         echo "<select class=\"input\" name=\"jalain3\" disabled>\r";   //By Default the item will be disabled.
         echo "<option value=''>--Select--</option>\r";
	     echo "</select>\r";
 		 echo "</div>";

    }
}
?>