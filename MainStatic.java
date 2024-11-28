package nov12;
class Employee{
	int id;
	String name;
	static String cname;
	//static String cname="EduBridgeIndia";
	
	
	
	static {
		System.out.println("Static block");
		cname="EduBridgeIndia";
	}
	{
		System.out.println("Annonymous block will execute before constructure");
	}
	public Employee(int id, String name) {
		super();
		System.out.println("Constructor");
		this.id = id;
		this.name = name;
	}
	
	void displayData() {
		System.out.println("ID="+id);
		System.out.println("Name="+name);
		System.out.println("cname="+cname);
	}
}
public class MainStatic {
	public static void main(String[] args) {
		System.out.println("main app");
		Employee e1 =new Employee(12,"Prabhat");
		Employee e2 =new Employee(13,"Monika");
		e1.displayData();
		e2.displayData();
	}
}
