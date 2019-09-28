<?php

$query = SELECT table_name.`name`,table_work.`name` AS work,table_kategori.salary 
				From table_name INNER JOIN table_work ON table_name.id_work=table_work.id 
				INNER JOIN table_kategori ON table_name.id_salary=table_kategori.id