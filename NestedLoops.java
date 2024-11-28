package nov8;

public class NestedLoops {

	public static void main(String[] args) {
		//Nested Loop
		for(int i=1;i<=5;i++) {
			for(int j=1;j<=i;j++) {
				System.out.print("*");
			}
			System.out.println();
		}

	}

}
