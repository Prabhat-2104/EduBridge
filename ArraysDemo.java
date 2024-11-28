package nov8;
import java.util.Scanner;
public class ArraysDemo {

	public static void main(String[] args) {
		int a[];
		int size;
		
		Scanner sc = new Scanner(System.in);
		System.out.println("Enter size of Array ");
		size = sc.nextInt();
		a=new int[size];
		System.out.println("Enter array element");
		for(int i=0;i<a.length;i++) {
			a[i]=sc.nextInt();
		}
		System.out.println("No of elements in array" +a.length);
		for(int i=0;i<a.length;i++) {
			System.out.println(a[i]);
		}
	}

}
