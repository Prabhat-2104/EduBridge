package nov12;
import java.util.Scanner;


class Parent{
	private int id; //private belongs same class,
	public String name;
	protected float salary;
	
	public void inputData() {
		Scanner sc = new Scanner(System.in);
		System.out.println("Enter Id");
		id = sc.nextInt();
		System.out.println("Enter name");
		name = sc.next();
		System.out.println("Enter salary");
		salary = sc.nextFloat();
	}
}


class Child extends Parent{ //is-A relation
	
	void display() {
		//System.out.println("Id "+id); //private data cannot be inherited
		
		System.out.println("name "+name);
		System.out.println("Salary "+salary);	
		
		}
}

public class InheritenceDemo1 {


	public static void main(String[] args) {
		Child cobj = new Child();
		cobj.inputData();
		cobj.display();
	}

}
