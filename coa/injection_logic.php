<?php
	class injection_logic {
		
		public function isSqlInjection($param){
			$array = array('select', 'select *', 'select * from', 'insert', 'insert into', 'update', 'delete', 'delete from');
			if(in_array(ucfirst($param), $array)){
				return true;
			}else if(in_array(lcfirst($param), $array)){
				return true;
			}else if(in_array(strtoupper($param), $array)){
				return true;
			}else if(in_array(strtolower($param), $array)){
				return true;
			}else{
				return false;
			}
		}
	}
?>