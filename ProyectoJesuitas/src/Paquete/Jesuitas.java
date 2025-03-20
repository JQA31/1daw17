package Paquete;

import java.awt.Font;
import java.awt.Image;
import java.awt.Rectangle;
import java.awt.event.ActionEvent;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class Jesuitas {
	
	JPanel jpnPrincipal;
	JLabel jlbTitulo,jlbAlumno,jlbJesuita,jlbFirma, img, jlbCodigo;
	JTextField jtfAlumno,jtfJesuita,jtfFirma, jtfFirmaIngles,jtfCodigo;
	JButton jbtEnviar;
	ConexionBD obj;
	SqlJesuitas objJesuitas;
	
	
	public Jesuitas() {
		// TODO Auto-generated constructor stub
		
		obj = new ConexionBD();
		objJesuitas = new SqlJesuitas(obj);
		
		jpnPrincipal = new JPanel();
		jpnPrincipal.setSize(500,600);
		jpnPrincipal.setLayout(null);
		
		jlbTitulo = new JLabel("¡Jesuitas!");
		jlbTitulo.setBounds(150, 20, 200, 40);
		jlbTitulo.setFont(new Font("Elephant",Font.BOLD,30));
		jpnPrincipal.add(jlbTitulo);
		
		jlbCodigo = new JLabel("Codigo:");
		jlbCodigo.setBounds(20, 75, 100, 30);
		jlbCodigo.setFont(new Font("Elephant",Font.BOLD,20));
		jpnPrincipal.add(jlbCodigo);
		
		jtfCodigo = new JTextField();
		jtfCodigo.setBounds(110, 80, 150, 30);
		jpnPrincipal.add(jtfCodigo);
		
		jtfAlumno = new JTextField();
		jtfAlumno.setBounds(110, 130, 150, 30);
		jpnPrincipal.add(jtfAlumno);
		
		jtfJesuita = new JTextField();
		jtfJesuita.setBounds(110, 180, 150, 30);
		jpnPrincipal.add(jtfJesuita);

		jtfFirma = new JTextField("Español");
		jtfFirma.setBounds(110, 230, 125, 200);
		jpnPrincipal.add(jtfFirma);
		
		jtfFirmaIngles = new JTextField("Ingles");
		jtfFirmaIngles.setBounds(250, 230, 125, 200);
		jpnPrincipal.add(jtfFirmaIngles);
		
		jlbAlumno = new JLabel("Alumno:");
		jlbAlumno.setBounds(20, 125, 100, 30);
		jlbAlumno.setFont(new Font("Elephant",Font.BOLD,20));
		jpnPrincipal.add(jlbAlumno);
		
		jlbJesuita = new JLabel("Jesuita:");
		jlbJesuita.setBounds(20, 175, 100, 30);
		jlbJesuita.setFont(new Font("Elephant",Font.BOLD,20));
		jpnPrincipal.add(jlbJesuita);
		
		jlbFirma = new JLabel("Firma:");
		jlbFirma.setBounds(35, 190, 100, 100);
		jlbFirma.setFont(new Font("Elephant",Font.BOLD,20));
		jpnPrincipal.add(jlbFirma);
		
		jbtEnviar = new JButton("Enviar");
		jbtEnviar.setBounds(200, 450, 100, 30);
		jbtEnviar.addActionListener(e->enviarjesuitas());
		jpnPrincipal.add(jbtEnviar);
		
		img = new JLabel();
		img.setBounds(new Rectangle(10, 20, 100, 40));
		img.setIcon(resizeIcon(new ImageIcon(getClass().getResource("logotipoevg.png")), img.getWidth(), img.getHeight()));
		jpnPrincipal.add(img);
		
	}
	
	private static ImageIcon resizeIcon(ImageIcon icon, int width, int height) {
        Image img = icon.getImage(); // Obtener la imagen
        Image scaledImg = img.getScaledInstance(width, height, Image.SCALE_SMOOTH); // Escalar la imagen
        return new ImageIcon(scaledImg); // Devolver la imagen escalada como ImageIcon
    }
	
	  public void enviarjesuitas() {
			
		  objJesuitas.insertarFila(jtfCodigo.getText(), jtfJesuita.getText(), jtfAlumno.getText(), jtfFirma.getText(), jtfFirmaIngles.getText());
	   
	  }
	  
	  public void actionPerformed(ActionEvent e) {
	       // TODO Auto-generated method stub
	
	       if (e.getSource()==jbtEnviar) enviarjesuitas();
	       
	   }

	public static void main(String[] args) {
		// TODO Auto-generated method stub

	}

}
