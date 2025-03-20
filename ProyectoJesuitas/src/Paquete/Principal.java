package Paquete;

import javax.swing.JFrame;
import javax.swing.JTabbedPane;

public class Principal {
	JFrame jfrFormulario;
	JTabbedPane jtpPrincipal;
	Jesuitas PanelJesuitas;
	Lugares PanelLugares;
	ConexionBD obj;
	public Principal() {
		// TODO Auto-generated constructor stub
		obj = new ConexionBD();
		PanelJesuitas= new Jesuitas();
		PanelLugares = new Lugares();
		
		jfrFormulario = new JFrame();
		jfrFormulario.setTitle("Proyecto Jesuitas");
		jfrFormulario.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		jfrFormulario.setSize(500,600);
		
		
		jtpPrincipal = new JTabbedPane();
		jfrFormulario.add(jtpPrincipal);
		jtpPrincipal.add("Jesuitas",PanelJesuitas.jpnPrincipal);
		jtpPrincipal.add("Lugares",PanelLugares.jpnLugares);
		
		jfrFormulario.setVisible(true);
	}

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		new Principal();
	}

}
