<?php
declare(strict_types = 1);

namespace Libraries;

Class Queries {
	
	private $columnValues = [];

	public function select_Where_Limit($table, $column, $limit, $offset)
	{
		return 'SELECT * FROM `'.$table.'` WHERE '.$column.' = ? LIMIT '.$limit.' OFFSET '.$offset;
	}

	public function select($table, $column1 = NULL , $column2 = NULL, $column3 = NULL)	{

		$select = 'SELECT * FROM `';
		
		if ($column1 == NULL) {

			return $select.$table.'`';

		} elseif(!$column1 == NULL && $column2 == NULL) {
			
			return $select.$table.'` WHERE '.$column1.' = ?';

		} elseif(!$column1 == NULL && !$column2 == NULL) {

			return $select.$table.'` WHERE '.$column1.' = ? AND '.$column2.' = ?';

		} else {

			return $select.$table.'` WHERE '.$column1.' = ? AND '.$column2.' = ? AND '.$column3.' = ?';
		}
	}

	public function __limit($table, $int)
	{
		return 'SELECT * FROM `'.$table.'` LIMIT '.$int;
	}

	public function __limit_Offset($table, $limit, $offset)
	{
		return 'SELECT * FROM `'.$table.'` LIMIT '.$limit.' OFFSET '.$offset;
	}

	public function __deleteAll($table, $db)
	{
		return 'TRUNCATE '.$db.'.'.$table;
	}

	public function Delete($table, $column)
	{
		return 'DELETE FROM `'.$table.'` WHERE '.$column.' = ?';
	} 

	public function Insert($table, $columns)
	{
		return 'INSERT INTO `'.$table.'`('.implode(', ', $columns).') 
		        VALUES('.implode(', ', array_fill(intval(0), count($columns), "?")).')';
	}

	public function Update($table, $columns, $column)
	{
		foreach ($columns as $cols) {
                    array_push($this->columnValues, $cols.' = ?');
                }        
        return 'UPDATE `'.$table.'` SET '.implode(', ', $this->columnValues).' 
                  WHERE '.$column.' = ?';
	}

	public function update__($table, $columns, $column, $column2)
	{
		foreach ($columns as $cols) {
                    array_push($this->columnValues, $cols.' = ?');
                }        
        return 'UPDATE `'.$table.'` SET '.implode(', ', $this->columnValues).' 
                  WHERE '.$column.' = ? AND '.$column2.' = ?';
	}

	public function countAll($table)	{
		return 'SELECT Count(*) AS num FROM `'.$table.'`';
	}

	public function find($table, $column)
	{
		return "SELECT * FROM `.$table.` WHERE `.$column.` LIKE ?";
	}

	public function count_where($table, $column)	{
		return 'SELECT Count(*) AS results FROM `'.$table.'` WHERE '.$column.' = ?';
	}

	public function count_where_and($table, $column1, $column2)
	{
		return 'SELECT Count(*) AS results FROM `'.$table.'` WHERE '.$column1.' = ? AND '.$column2.' = ?';
	}
		
	public function column_sum($column, $table, $column1)	{
		return 'SELECT SUM('.$column.') AS results FROM `'.$table.'` WHERE '.$column1.' = ?';
	}

	public function sum($table, $column, $column1)	{
		return 'SELECT SUM('.$column.') AS results FROM `'.$table.'` WHERE '.$column1.' = ?';
	}
}