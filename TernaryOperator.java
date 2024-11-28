package nov4;

import java.util.Scanner;
public class TernaryOperator {
	public static void main(String[] args) {
				// TODO Auto-generated method stub
				Scanner sc=new Scanner(System.in);
				System.out.println("Enter your first number:");
				int a=sc.nextInt();
				System.out.println("Enter your second number:");
				int b=sc.nextInt();
				System.out.println("Enter your third number:");
				int c=sc.nextInt();
				int big=(a>b && a>c)?a:(b>a && b>c)?b:c;
				System.out.println("Largest of "+a+" , "+b+" and "+c+" is :"+big);

			}
}
