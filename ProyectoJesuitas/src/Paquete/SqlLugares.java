package Paquete;

import java.sql.SQLException;

public class SqlLugares {
	ConexionBD objConexion=null;
	
	public SqlLugares(ConexionBD objConexion){
		this.objConexion=objConexion;
	}
	
	
	public void insertarFila (String ip, String nombre, String lugar){
        try {
           String cadena = "INSERT INTO Lugares(IP,N_Equipo,Lugar) VALUES ('"    
        		+ip+ "','"   
				+nombre+ "','" 
				+lugar+"');";
            
           System.out.println(cadena);
            objConexion.sentencia.executeUpdate(cadena);
          } catch (SQLException ex) {ex.printStackTrace();}
    }

}
