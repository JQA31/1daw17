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

public class Lugares {

	JPanel jpnLugares;
	JLabel jlbTitulo,jlbIP,jlbNombre,jlbLugar,img;
	JTextField jtfIP,jtfNombre,jtfLugar;
	JButton jbtEnviar;
	ConexionBD obj;
	SqlLugares objLugares;
	
	public Lugares() {
		// TODO Auto-generated constructor stub
		
		obj = new ConexionBD();
		objLugares = new SqlLugares(obj);
		
		jpnLugares = new JPanel();
		jpnLugares.setSize(500,600);
		jpnLugares.setLayout(null);
		
		jlbTitulo = new JLabel("¡Lugares!");
		jlbTitulo.setBounds(150, 20, 200, 40);
		jlbTitulo.setFont(new Font("Elephant",Font.BOLD,40));
		jpnLugares.add(jlbTitulo);
		
		jlbIP = new JLabel("IP:");
		jlbIP.setBounds(20, 75, 100, 30);
		jlbIP.setFont(new Font("Elephant",Font.BOLD,20));
		jpnLugares.add(jlbIP);
		
		jtfIP = new JTextField();
		jtfIP.setBounds(110, 80, 150, 30);
		jpnLugares.add(jtfIP);
		
		jlbNombre = new JLabel("Equipo:");
		jlbNombre.setBounds(20, 125, 100, 30);
		jlbNombre.setFont(new Font("Elephant",Font.BOLD,20));
		jpnLugares.add(jlbNombre);
		
		jtfNombre = new JTextField();
		jtfNombre.setBounds(110, 130, 150, 30);
		jpnLugares.add(jtfNombre);
		
		jlbLugar = new JLabel("Lugar:");
		jlbLugar.setBounds(20, 175, 100, 30);
		jlbLugar.setFont(new Font("Elephant",Font.BOLD,20));
		jpnLugares.add(jlbLugar);
		
		jtfLugar = new JTextField();
		jtfLugar.setBounds(110, 180, 150, 30);
		jpnLugares.add(jtfLugar);
	
		img = new JLabel();
		img.setBounds(new Rectangle(10, 20, 100, 40));
		img.setIcon(resizeIcon(new ImageIcon(getClass().getResource("logotipoevg.png")), img.getWidth(), img.getHeight()));
		jpnLugares.add(img);
		
		jbtEnviar = new JButton("Enviar");
		jbtEnviar.setBounds(200, 450, 100, 30);
		jbtEnviar.addActionListener(e->enviarlugares());
		jpnLugares.add(jbtEnviar);
		
	}

	private static ImageIcon resizeIcon(ImageIcon icon, int width, int height) {
        Image img = icon.getImage(); // Obtener la imagen
        Image scaledImg = img.getScaledInstance(width, height, Image.SCALE_SMOOTH); // Escalar la imagen
        return new ImageIcon(scaledImg); // Devolver la imagen escalada como ImageIcon
    }
	
	 public void enviarlugares() {
			
		  objLugares.insertarFila(jtfIP.getText(), jtfNombre.getText(), jtfLugar.getText());
	   
	  }
	
	 public void actionPerformed(ActionEvent e) {
	       // TODO Auto-generated method stub
	       if (e.getSource()==jbtEnviar) enviarlugares();
	       
	   }
	 
	public static void main(String[] args) {
		// TODO Auto-generated method stub

	}

}
