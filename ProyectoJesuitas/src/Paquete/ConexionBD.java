package Paquete;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

public class ConexionBD {
	public Connection conexion=null;
    public Statement sentencia=null;   		//Se usa para enviar sentencias SQL a la BD
    public ResultSet resultado=null;   		//Contendr  los datos devueltos de una sentencia SQL
    
	public ConexionBD() {
		// TODO Auto-generated constructor stub
		conectarBD();
	}
	
	public void conectarBD() {
		// Conectar con MySql
		String url = "jdbc:mysql://localhost/jesuitas";

		// Cargar el driver y se genera una nueva instancia y crear conexion
		try {
			
			Class.forName("com.mysql.jdbc.Driver").newInstance();
			conexion = DriverManager.getConnection(url, "root", "");
			// Crear sentencia
			sentencia = (Statement) conexion.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
		} catch (Exception e) {
			e.printStackTrace();
		}

	}

    public void cerrarConexionBD(){
        try {
            resultado.close();
            sentencia.close();
            conexion.close();
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
               
    }
}
