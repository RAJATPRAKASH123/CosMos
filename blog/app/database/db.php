<?php
session_start();

require('connect.php');




function dd($value) // to be deleted
{
    echo "<pre>", print_r($value, true),"</pre>";
    die();
}

function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql); // prepare statement for security pupose
    $values = array_values($data);
    $types = str_repeat('s', count($values)); // take a string and repeat a no. of times
    $stmt->bind_param( $types, ...$values); // $stmt->bind_param($conditions, 'ss'); php is smart enough to typecast string into php
    $stmt->execute();
    return $stmt;
}

function selectDistinct($table, $column)
{
    global $conn;
    $sql = "SELECT DISTINCT $column FROM $table";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}



function selectOne($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table"; // query
    

    // // return records that match conditions...
    // $sql = "SELECT * FROM users WHERE admin = 0 AND username = 'Rajat' LIMIT"
    $i = 0;
    foreach ( $conditions as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " WHERE $key = ?";
        } else {
            $sql = $sql . " AND $key = ?";
        }
        $i++;
    }
    // dd($sql);

    // $sql = "SELECT * FROM users WHERE admin = 0 AND username = 'Rajat' LIMIT"
    $sql = $sql . " LIMIT 1";

    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
    
    
}
function selectOne_logi($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table"; // query
    

    // // return records that match conditions...
    // $sql = "SELECT * FROM users WHERE admin = 0 AND username = 'Rajat' LIMIT"
    $i = 0;
    foreach ( $conditions as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " WHERE $key = ?";
        } else {
            $sql = $sql . " AND $key = ?";
        }
        $i++;
    }
    // dd($sql);

    // $sql = "SELECT * FROM users WHERE admin = 0 AND username = 'Rajat' LIMIT"
    $sql = $sql . " LIMIT 1";

    $stmt = executeQuery($sql, $conditions);
    $records = $stmt->get_result()->fetch_assoc();
    return $records;
    
    
}


function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table"; // query
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql); // prepare statement for security pupose
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }else{
        // // return records that match conditions...
        // $sql = "SELECT * FROM users WHERE username "
        $i = 0;
        foreach ( $conditions as $key => $value ) {
            if ( $i === 0)
            {
                $sql = $sql . " WHERE $key = ?";
            } else {
                $sql = $sql . " AND $key = ?";
            }
            $i++;
        }
        // dd($sql);
        $stmt = $stmt = executeQuery($sql, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    
}
function selectSat($my_array, $condition){
	if(count($my_array) == 1 ) return $my_array;
	$mid = count($my_array) / 2;
    $left = array_slice($my_array, 0, $mid);
    $right = array_slice($my_array, $mid);
	$left = selectSat($left, $condition);
	$right = selectSat($right, $condition);
	return merge($left, $right, $condition);
}
function merge($left, $right, $condition){
	$res = array();
	while (count($left) > 0 && count($right) > 0){
		if(strtotime($left[0][$condition]) > strtotime($right[0][$condition])){
			$res[] = $right[0];
			$right = array_slice($right , 1);
		}else{
			$res[] = $left[0];
			$left = array_slice($left, 1);
		}
	}
	while (count($left) > 0){
		$res[] = $left[0];
		$left = array_slice($left, 1);
	}
	while (count($right) > 0){
		$res[] = $right[0];
		$right = array_slice($right, 1);
	}
	return $res;
}

function create( $table, $data)
{
    global $conn;
    // $sql = "INSERT INTO users (username, admin, email, password) VALUES (?, ?, ?, ?)" // no differnce between them
    //$sql = "INSERT INTO users SET username = ?, admin = ?, email = ?, password = ?"
    $sql = "INSERT INTO $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }
    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
    
}


function update( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE id = ?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updateOrg( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE Organisation_Name = ?";
    $data['Organisation_Name'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updatePro( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE Project_id = ?";
    $data['Project_id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updateUser( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE User_ID = ?";
    $data['User_ID'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updateAdmin( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE Admin_ID = ?";
    $data['Admin_ID'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updateClient( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE Client_Id = ?";
    $data['Client_Id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updateCountry( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE Country = ?";
    $data['Country'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updateSat( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE Satellite_ID = ?";
    $data['Satellite_ID'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updateSup( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE Supplier_Id = ?";
    $data['Supplier_Id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}

function updateCenter( $table, $id, $data)
{
    global $conn;

    //$sql = "UPDATE users SET username = ?, admin = ?, email = ?, password = ? WHERE id = ?" 
    $sql = "UPDATE $table SET";
    $i = 0;
    foreach ( $data as $key => $value ) {
        if ( $i === 0)
        {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }

    $sql = $sql . " WHERE Center_ID = ?";
    $data['Center_ID'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
    
}


function delete( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE id = ?";
   
    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
    
}

function deleteUser( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE User_ID = ?";
   
    $stmt = executeQuery($sql, ['User_ID' => $id]);
    return $stmt->affected_rows;  
}

function deleteAdmin( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE Admin_ID = ?";
   
    $stmt = executeQuery($sql, ['Admin_ID' => $id]);
    return $stmt->affected_rows;  
}

function deleteClient( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE Client_Id = ?";
   
    $stmt = executeQuery($sql, ['Client_Id' => $id]);
    return $stmt->affected_rows;  
}

function deleteCountry( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE Country = ?";
   
    $stmt = executeQuery($sql, ['Country' => $id]);
    return $stmt->affected_rows;  
}

function deleteOrg( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE Organisation_Name = ?";
   
    $stmt = executeQuery($sql, ['Organisation_Name' => $id]);
    return $stmt->affected_rows;  
}

function deletePro( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE Project_id = ?";
   
    $stmt = executeQuery($sql, ['Project_id' => $id]);
    return $stmt->affected_rows;  
}

function deleteSat( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE Satellite_ID = ?";
   
    $stmt = executeQuery($sql, ['Satellite_ID' => $id]);
    return $stmt->affected_rows;  
}

function deleteSup( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE Supplier_Id = ?";
   
    $stmt = executeQuery($sql, ['Satellite_Id' => $id]);
    return $stmt->affected_rows;  
}

function deleteCenter( $table, $id )
{
    global $conn;

    //$sql = "DELETE FROM users WHERE id = ?"
    $sql = "DELETE FROM $table WHERE Center_ID = ?";
   
    $stmt = executeQuery($sql, ['Center_ID' => $id]);
    return $stmt->affected_rows;  
}

function searchSat($term)
{
    $match = '%' . $term . '%';
    global $conn;
    $sql = "SELECT * FROM sattelite_gen_normalised___sat_info WHERE Name_of_Satellite LIKE ? OR Operator_Owner LIKE ?";
    $stmt = executeQuery($sql, ['Name_of_Satellite' => $match, 'Operator_Owner' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}


// example conditions : - 
// $data = ['admin' => 1,
//         'username' => 'Rohit Vishwas',
//          'email' => 'sav127rajat@gmail.com',
//          'password' => '147852369'         
// ];

// $id = update('users', 2, $data);
// dd($id);



// $id = delete('users', 2);
// dd($id);