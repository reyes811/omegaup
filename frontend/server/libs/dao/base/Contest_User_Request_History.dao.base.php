<?php

/** ******************************************************************************* *
  *                    !ATENCION!                                                   *
  *                                                                                 *
  * Este codigo es generado automaticamente. Si lo modificas tus cambios seran      *
  * reemplazados la proxima vez que se autogenere el codigo.                        *
  *                                                                                 *
  * ******************************************************************************* */

/** ContestUserRequestHistory Data Access Object (DAO) Base.
  * 
  * Esta clase contiene toda la manipulacion de bases de datos que se necesita para 
  * almacenar de forma permanente y recuperar instancias de objetos {@link ContestUserRequestHistory }. 
  * @access public
  * @abstract
  * 
  */
abstract class ContestUserRequestHistoryDAOBase extends DAO
{

	/**
	  *	Guardar registros. 
	  *	
	  *	Este metodo guarda el estado actual del objeto {@link ContestUserRequestHistory} pasado en la base de datos. La llave 
	  *	primaria indicara que instancia va a ser actualizado en base de datos. Si la llave primara o combinacion de llaves
	  *	primarias describen una fila que no se encuentra en la base de datos, entonces save() creara una nueva fila, insertando
	  *	en ese objeto el ID recien creado.
	  *	
	  *	@static
	  * @throws Exception si la operacion fallo.
	  * @param ContestUserRequestHistory [$Contest_User_Request_History] El objeto de tipo ContestUserRequestHistory
	  * @return Un entero mayor o igual a cero denotando las filas afectadas.
	  **/
	public static final function save( $Contest_User_Request_History )
	{
		if (!is_null(self::getByPK( $Contest_User_Request_History->getHistoryId() )))
		{
			return ContestUserRequestHistoryDAOBase::update( $Contest_User_Request_History);
		} else {
			return ContestUserRequestHistoryDAOBase::create( $Contest_User_Request_History);
		}
	}


	/**
	  *	Obtener {@link ContestUserRequestHistory} por llave primaria. 
	  *	
	  * Este metodo cargara un objeto {@link ContestUserRequestHistory} de la base de datos 
	  * usando sus llaves primarias. 
	  *	
	  *	@static
	  * @return @link ContestUserRequestHistory Un objeto del tipo {@link ContestUserRequestHistory}. NULL si no hay tal registro.
	  **/
	public static final function getByPK(  $history_id )
	{
		if(  is_null( $history_id )  ){ return NULL; }
		$sql = "SELECT * FROM Contest_User_Request_History WHERE (history_id = ? ) LIMIT 1;";
		$params = array(  $history_id );
		global $conn;
		$rs = $conn->GetRow($sql, $params);
		if(count($rs)==0) return NULL;
		$foo = new ContestUserRequestHistory( $rs );
		return $foo;
	}

	/**
	  *	Obtener todas las filas.
	  *	
	  * Esta funcion leera todos los contenidos de la tabla en la base de datos y construira
	  * un vector que contiene objetos de tipo {@link ContestUserRequestHistory}. Tenga en cuenta que este metodo
	  * consumen enormes cantidades de recursos si la tabla tiene muchas filas. 
	  * Este metodo solo debe usarse cuando las tablas destino tienen solo pequenas cantidades de datos o se usan sus parametros para obtener un menor numero de filas.
	  *	
	  *	@static
	  * @param $pagina Pagina a ver.
	  * @param $columnas_por_pagina Columnas por pagina.
	  * @param $orden Debe ser una cadena con el nombre de una columna en la base de datos.
	  * @param $tipo_de_orden 'ASC' o 'DESC' el default es 'ASC'
	  * @return Array Un arreglo que contiene objetos del tipo {@link ContestUserRequestHistory}.
	  **/
	public static final function getAll( $pagina = NULL, $columnas_por_pagina = NULL, $orden = NULL, $tipo_de_orden = 'ASC' )
	{
		$sql = "SELECT * from Contest_User_Request_History";
		if( ! is_null ( $orden ) )
		{ $sql .= " ORDER BY `" . $orden . "` " . $tipo_de_orden;	}
		if( ! is_null ( $pagina ) )
		{
			$sql .= " LIMIT " . (( $pagina - 1 )*$columnas_por_pagina) . "," . $columnas_por_pagina; 
		}
		global $conn;
		$rs = $conn->Execute($sql);
		$allData = array();
		foreach ($rs as $foo) {
			$bar = new ContestUserRequestHistory($foo);
    		array_push( $allData, $bar);
		}
		return $allData;
	}


	/**
	  *	Buscar registros.
	  *	
	  * Este metodo proporciona capacidad de busqueda para conseguir un juego de objetos {@link ContestUserRequestHistory} de la base de datos. 
	  * Consiste en buscar todos los objetos que coinciden con las variables permanentes instanciadas de objeto pasado como argumento. 
	  * Aquellas variables que tienen valores NULL seran excluidos en busca de criterios.
	  *	
	  * <code>
	  *  /**
	  *   * Ejemplo de uso - buscar todos los clientes que tengan limite de credito igual a 20000
	  *   {@*} 
	  *	  $cliente = new Cliente();
	  *	  $cliente->setLimiteCredito("20000");
	  *	  $resultados = ClienteDAO::search($cliente);
	  *	  
	  *	  foreach($resultados as $c ){
	  *	  	echo $c->getNombre() . "<br>";
	  *	  }
	  * </code>
	  *	@static
	  * @param ContestUserRequestHistory [$Contest_User_Request_History] El objeto de tipo ContestUserRequestHistory
	  * @param $orderBy Debe ser una cadena con el nombre de una columna en la base de datos.
	  * @param $orden 'ASC' o 'DESC' el default es 'ASC'
	  **/
	public static final function search( $Contest_User_Request_History , $orderBy = null, $orden = 'ASC', $offset = 0, $rowcount = NULL, $likeColumns = NULL)
	{
		if (!($Contest_User_Request_History instanceof ContestUserRequestHistory)) {
			return self::search(new ContestUserRequestHistory($Contest_User_Request_History));
		}

		$sql = "SELECT * from Contest_User_Request_History WHERE ("; 
		$val = array();
		if (!is_null( $Contest_User_Request_History->getHistoryId())) {
			$sql .= " `history_id` = ? AND";
			array_push( $val, $Contest_User_Request_History->getHistoryId() );
		}
		if (!is_null( $Contest_User_Request_History->getUserId())) {
			$sql .= " `user_id` = ? AND";
			array_push( $val, $Contest_User_Request_History->getUserId() );
		}
		if (!is_null( $Contest_User_Request_History->getContestId())) {
			$sql .= " `contest_id` = ? AND";
			array_push( $val, $Contest_User_Request_History->getContestId() );
		}
		if (!is_null( $Contest_User_Request_History->getTime())) {
			$sql .= " `time` = ? AND";
			array_push( $val, $Contest_User_Request_History->getTime() );
		}
		if (!is_null( $Contest_User_Request_History->getAccepted())) {
			$sql .= " `accepted` = ? AND";
			array_push( $val, $Contest_User_Request_History->getAccepted() );
		}
		if (!is_null( $Contest_User_Request_History->getAdminId())) {
			$sql .= " `admin_id` = ? AND";
			array_push( $val, $Contest_User_Request_History->getAdminId() );
		}
		if (!is_null($likeColumns)) {
			foreach ($likeColumns as $column => $value) {
				$escapedValue = mysql_real_escape_string($value);
				$sql .= "`{$column}` LIKE '%{$value}%' AND";
			}
		}
		if(sizeof($val) == 0) {
			return self::getAll();
		}
		$sql = substr($sql, 0, -3) . " )";
		if( ! is_null ( $orderBy ) ){
			$sql .= " ORDER BY `" . $orderBy . "` " . $orden;
		}
		// Add LIMIT offset, rowcount if rowcount is set
		if (!is_null($rowcount)) {
			$sql .= " LIMIT ". $offset . "," . $rowcount;
		}
		global $conn;
		$rs = $conn->Execute($sql, $val);
		$ar = array();
		foreach ($rs as $foo) {
			$bar =  new ContestUserRequestHistory($foo);
			array_push( $ar,$bar);
		}
		return $ar;
	}

	/**
	  *	Actualizar registros.
	  *
	  * @return Filas afectadas
	  * @param ContestUserRequestHistory [$Contest_User_Request_History] El objeto de tipo ContestUserRequestHistory a actualizar.
	  **/
	private static final function update($Contest_User_Request_History)
	{
		$sql = "UPDATE Contest_User_Request_History SET  `user_id` = ?, `contest_id` = ?, `time` = ?, `accepted` = ?, `admin_id` = ? WHERE  `history_id` = ?;";
		$params = array( 
			$Contest_User_Request_History->getUserId(), 
			$Contest_User_Request_History->getContestId(), 
			$Contest_User_Request_History->getTime(), 
			$Contest_User_Request_History->getAccepted(), 
			$Contest_User_Request_History->getAdminId(), 
			$Contest_User_Request_History->getHistoryId(), );
		global $conn;
		$conn->Execute($sql, $params);
		return $conn->Affected_Rows();
	}

	/**
	  *	Crear registros.
	  *	
	  * Este metodo creara una nueva fila en la base de datos de acuerdo con los 
	  * contenidos del objeto ContestUserRequestHistory suministrado. Asegurese
	  * de que los valores para todas las columnas NOT NULL se ha especificado 
	  * correctamente. Despues del comando INSERT, este metodo asignara la clave 
	  * primaria generada en el objeto ContestUserRequestHistory dentro de la misma transaccion.
	  *	
	  * @return Un entero mayor o igual a cero identificando las filas afectadas, en caso de error, regresara una cadena con la descripcion del error
	  * @param ContestUserRequestHistory [$Contest_User_Request_History] El objeto de tipo ContestUserRequestHistory a crear.
	  **/
	private static final function create( $Contest_User_Request_History )
	{
		if (is_null($Contest_User_Request_History->time)) $Contest_User_Request_History->time = gmdate('Y-m-d H:i:s');
		$sql = "INSERT INTO Contest_User_Request_History ( `history_id`, `user_id`, `contest_id`, `time`, `accepted`, `admin_id` ) VALUES ( ?, ?, ?, ?, ?, ?);";
		$params = array( 
			$Contest_User_Request_History->history_id,
			$Contest_User_Request_History->user_id,
			$Contest_User_Request_History->contest_id,
			$Contest_User_Request_History->time,
			$Contest_User_Request_History->accepted,
			$Contest_User_Request_History->admin_id,
		 );
		global $conn;
		$conn->Execute($sql, $params);
		$ar = $conn->Affected_Rows();
		if($ar == 0) return 0;
 		$Contest_User_Request_History->history_id = $conn->Insert_ID();

		return $ar;
	}

	/**
	  *	Buscar por rango.
	  *	
	  * Este metodo proporciona capacidad de busqueda para conseguir un juego de objetos {@link ContestUserRequestHistory} de la base de datos siempre y cuando 
	  * esten dentro del rango de atributos activos de dos objetos criterio de tipo {@link ContestUserRequestHistory}.
	  * 
	  * Aquellas variables que tienen valores NULL seran excluidos en la busqueda (los valores 0 y false no son tomados como NULL) .
	  * No es necesario ordenar los objetos criterio, asi como tambien es posible mezclar atributos.
	  * Si algun atributo solo esta especificado en solo uno de los objetos de criterio se buscara que los resultados conicidan exactamente en ese campo.
	  *	
	  * <code>
	  *  /**
	  *   * Ejemplo de uso - buscar todos los clientes que tengan limite de credito 
	  *   * mayor a 2000 y menor a 5000. Y que tengan un descuento del 50%.
	  *   {@*} 
	  *	  $cr1 = new Cliente();
	  *	  $cr1->setLimiteCredito("2000");
	  *	  $cr1->setDescuento("50");
	  *	  
	  *	  $cr2 = new Cliente();
	  *	  $cr2->setLimiteCredito("5000");
	  *	  $resultados = ClienteDAO::byRange($cr1, $cr2);
	  *	  
	  *	  foreach($resultados as $c ){
	  *	  	echo $c->getNombre() . "<br>";
	  *	  }
	  * </code>
	  *	@static
	  * @param ContestUserRequestHistory [$Contest_User_Request_History] El objeto de tipo ContestUserRequestHistory
	  * @param ContestUserRequestHistory [$Contest_User_Request_History] El objeto de tipo ContestUserRequestHistory
	  * @param $orderBy Debe ser una cadena con el nombre de una columna en la base de datos.
	  * @param $orden 'ASC' o 'DESC' el default es 'ASC'
	  **/
	public static final function byRange( $Contest_User_Request_HistoryA , $Contest_User_Request_HistoryB , $orderBy = null, $orden = 'ASC')
	{
		$sql = "SELECT * from Contest_User_Request_History WHERE ("; 
		$val = array();
		if( ( !is_null (($a = $Contest_User_Request_HistoryA->getHistoryId()) ) ) & ( ! is_null ( ($b = $Contest_User_Request_HistoryB->getHistoryId()) ) ) ){
				$sql .= " `history_id` >= ? AND `history_id` <= ? AND";
				array_push( $val, min($a,$b)); 
				array_push( $val, max($a,$b)); 
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `history_id` = ? AND"; 
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
			
		}

		if( ( !is_null (($a = $Contest_User_Request_HistoryA->getUserId()) ) ) & ( ! is_null ( ($b = $Contest_User_Request_HistoryB->getUserId()) ) ) ){
				$sql .= " `user_id` >= ? AND `user_id` <= ? AND";
				array_push( $val, min($a,$b)); 
				array_push( $val, max($a,$b)); 
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `user_id` = ? AND"; 
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
			
		}

		if( ( !is_null (($a = $Contest_User_Request_HistoryA->getContestId()) ) ) & ( ! is_null ( ($b = $Contest_User_Request_HistoryB->getContestId()) ) ) ){
				$sql .= " `contest_id` >= ? AND `contest_id` <= ? AND";
				array_push( $val, min($a,$b)); 
				array_push( $val, max($a,$b)); 
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `contest_id` = ? AND"; 
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
			
		}

		if( ( !is_null (($a = $Contest_User_Request_HistoryA->getTime()) ) ) & ( ! is_null ( ($b = $Contest_User_Request_HistoryB->getTime()) ) ) ){
				$sql .= " `time` >= ? AND `time` <= ? AND";
				array_push( $val, min($a,$b)); 
				array_push( $val, max($a,$b)); 
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `time` = ? AND"; 
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
			
		}

		if( ( !is_null (($a = $Contest_User_Request_HistoryA->getAccepted()) ) ) & ( ! is_null ( ($b = $Contest_User_Request_HistoryB->getAccepted()) ) ) ){
				$sql .= " `accepted` >= ? AND `accepted` <= ? AND";
				array_push( $val, min($a,$b)); 
				array_push( $val, max($a,$b)); 
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `accepted` = ? AND"; 
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
			
		}

		if( ( !is_null (($a = $Contest_User_Request_HistoryA->getAdminId()) ) ) & ( ! is_null ( ($b = $Contest_User_Request_HistoryB->getAdminId()) ) ) ){
				$sql .= " `admin_id` >= ? AND `admin_id` <= ? AND";
				array_push( $val, min($a,$b)); 
				array_push( $val, max($a,$b)); 
		}elseif( !is_null ( $a ) || !is_null ( $b ) ){
			$sql .= " `admin_id` = ? AND"; 
			$a = is_null ( $a ) ? $b : $a;
			array_push( $val, $a);
			
		}

		$sql = substr($sql, 0, -3) . " )";
		if( !is_null ( $orderBy ) ){
		    $sql .= " order by `" . $orderBy . "` " . $orden ;

		}
		global $conn;
		$rs = $conn->Execute($sql, $val);
		$ar = array();
		foreach ($rs as $row) {
			array_push( $ar, $bar = new ContestUserRequestHistory($row));
		}
		return $ar;
	}

	/**
	  *	Eliminar registros.
	  *	
	  * Este metodo eliminara la informacion de base de datos identificados por la clave primaria
	  * en el objeto ContestUserRequestHistory suministrado. Una vez que se ha suprimido un objeto, este no 
	  * puede ser restaurado llamando a save(). save() al ver que este es un objeto vacio, creara una nueva fila 
	  * pero el objeto resultante tendra una clave primaria diferente de la que estaba en el objeto eliminado. 
	  * Si no puede encontrar eliminar fila coincidente a eliminar, Exception sera lanzada.
	  *	
	  *	@throws Exception Se arroja cuando el objeto no tiene definidas sus llaves primarias.
	  *	@return int El numero de filas afectadas.
	  * @param ContestUserRequestHistory [$Contest_User_Request_History] El objeto de tipo ContestUserRequestHistory a eliminar
	  **/
	public static final function delete( $Contest_User_Request_History )
	{
		if( is_null( self::getByPK($Contest_User_Request_History->getHistoryId()) ) ) throw new Exception('Campo no encontrado.');
		$sql = "DELETE FROM Contest_User_Request_History WHERE  history_id = ?;";
		$params = array( $Contest_User_Request_History->getHistoryId() );
		global $conn;

		$conn->Execute($sql, $params);
		return $conn->Affected_Rows();
	}


}