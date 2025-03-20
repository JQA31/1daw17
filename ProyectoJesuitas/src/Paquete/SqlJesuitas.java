package Paquete;

import java.sql.SQLException;

public class SqlJesuitas {
	ConexionBD objConexion=null;
	
	public SqlJesuitas(ConexionBD objConexion){
		this.objConexion=objConexion;
	}
	
	
	public void insertarFila (String codigo, String nombre, String nombreAlumno, String firma, String firmaIngles){
        try {
           String cadena = "INSERT INTO jesuita(codigo,nombre,nombreAlumno,firma,firmaIngles) VALUES ('"    
        		+codigo+ "','"   
				+nombre+ "','" 
				+nombreAlumno+ "','" 
				+firma+ "','" 
				+firmaIngles+"');";
            
           System.out.println(cadena);
            objConexion.sentencia.executeUpdate(cadena);
          } catch (SQLException ex) {ex.printStackTrace();}
    }

}
