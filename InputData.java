package oct31;
import java.util.Scanner;


public class InputData {


	public static void main(String[] args) {
		int age;
		String name;
		float salary;
		char gen;
		
		//user input
		Scanner scanner = new Scanner(System.in);
		
		System.out.println("Enter age");
		age = scanner.nextInt();
		
		System.out.println("Enter Name");
		scanner.next();
		//name = scanner.next(); //single word
		name = scanner.nextLine();  //use nextLine() to read line
		
		
		System.out.println("Enter salary");
		salary = scanner.nextFloat();
		
		System.out.println("Enter gender");
		gen = scanner.next().charAt(0);
		
		System.out.println("Name="+name);
		System.out.println("Age="+age);
		System.out.println("Salary="+salary);
		System.out.println("gen="+gen);
		
	}


}
